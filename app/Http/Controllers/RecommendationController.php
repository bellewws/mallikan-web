<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Produk;
use App\User;
use DB;
use Auth;

class RecommendationController extends Controller
{

    public function main($member, $similarities, $fullProduk)
    {
        $hasil = [];
        foreach($fullProduk as $key=>$fp){
            foreach($fp as $k=>$fpx){
                $produkSorted[$k][$key] = $fpx;
            }
        }

        foreach($similarities as $np=>$sim){
            foreach($produkSorted[$member] as $key=>$value){
                if($np == $key){
                    continue 2;
                }
            }
            $atas = 0;
            $bawah = 0;
            foreach($produkSorted[$member] as $key=>$value){
                if (isset($similarities[$np][$key])) {
                    if($similarities[$np][$key] > 0){
                        $atas += $value * $similarities[$np][$key];            
                    }
                }
            }
    
            foreach($similarities[$np] as $sim){
                if ($sim > 0) {
                    $bawah += $sim;
                }
            }
    
            if ($bawah > 0 && $atas > 0) {
                // $hasil[$np]['similarities'] = $similarities[$np];
                // $hasil[$np]['atas'] = $atas;
                // $hasil[$np]['bawah'] = $bawah;
                $hasil[$np]['hasil'] = $atas/$bawah;
                $hasil[$np]['id_produk'] = $np;
            }
        }
        return $hasil;
    }

    public function getSimilarities($fullProduk){
        //udah ditranspos
        $rata = $this->getRata($fullProduk);

        $hasil = [];
        foreach ($fullProduk as $k1 => $v1) {
            foreach ($fullProduk as $k2 => $v2){
                $subhasil = 0;
                if($k1 != $k2){
                    $atas = $this->atas($k1, $k2, $rata, $v1, $v2);
                    $bawah = $this->bawah($k1, $k2, $rata, $v1, $v2);
                    if($bawah != 0){
                        $subhasil = $atas/$bawah;
                    }else{
                        $subhasil = 0;
                    }
                    // $hasil[$k1][$k2]['atas'] = $atas;
                    // $hasil[$k1][$k2]['bawah'] = $bawah;
                    // $hasil[$k1][$k2]['hasil'] = $subhasil;
                    $hasil[$k1][$k2] = $subhasil;
                }
            }
        }
        return $hasil;
    }

    public function getRata($produk){
        $rata = [];
        
        foreach($produk as $key=>$value){
            $total = 0;
            foreach($value as $k=>$v){
                $total += $v;       
            }
            $rata[$key] = $total/sizeof($value);
        }
        
        return $rata;
    }

    public function atas($produk1, $produk2, $rata, $member1, $member2)
    {
        $total = 0;
        foreach($member1 as $k1=>$p1){
            foreach ($member2 as $k2=>$p2) {
                if($k1 == $k2){
                    $total+=($p1 - $rata[$produk1])*($p2 - $rata[$produk2]);
                }
            }
        }

        return $total;
    }
    
    public function bawah($produk1, $produk2, $rata, $member1, $member2)
    {
        $totalProduk1 = 0;
        $totalProduk2 = 0;

        foreach($member1 as $k1=>$p1){
            foreach ($member2 as $k2=>$p2) {
                if($k1 == $k2){
                    $totalProduk1 +=pow($p1 - $rata[$produk1], 2);
                    $totalProduk2 +=pow($p2 - $rata[$produk2], 2);
                }
            }
        }

        $hasil = sqrt($totalProduk1) * sqrt($totalProduk2);
        return $hasil;
    }


    public function index()
    {
        $terlaris = Produk::orderByDesc('terjual')->limit(8)->get();
        $produk = "none";
        // dd($terlaris);
        if (Auth::check()) {
            if (Auth::user()->user_role==1) {
                $konfirmasi= Transaksi::where('id_status',2)->with(['user','toko','produk','jenis','kategori','status','alamat'])->get();

                $data = [
                    'notif'=>$this->getStatusAdmin(),
                    'konfirmasi'=>$konfirmasi
                ];
                return view('admin.transaksi.menunggu-konfirmasi',$data);
            }
            elseif (Auth::user()->user_role==2) {
                //mendapatkan id user
                $user = Auth::user()->id;

                //mendapatkan transaksi dengan user yang berbeda-beda
                $transaksiUser = Transaksi::distinct('id_user')->get();
                //mendapatkan transaksi user berdasarkan id usernya
                $userExist = Transaksi::where('id_user', $user)->get();


                $result_userExist = [];
                foreach ($userExist as $r) {
                    array_push($result_userExist, $r->id);
                }

                //matriks penampung rating dari transaksi user
                $fullProduk = [];

                //Dimensi pertama = mengisi id user
                foreach ($transaksiUser as $tu) {
                    $id_user = $tu->id_user;

                    $transaksiProdukUser = Transaksi::select(DB::raw('id_produk, id_user, avg(rating) as rata_rating'))
                    ->where('id_user', $id_user)
                    ->groupby('id_produk','id_user')
                    ->get();
                    $produkArray = [];

                    //Dimensi kedua = mengisi rating dari masing-masing produk
                    foreach ($transaksiProdukUser as $tpu) {
                        $produkArray[$tpu->id_produk] = $tpu->rata_rating;

                    }
                        $fullProduk[$id_user] = $produkArray;
                }
                
                $fullProdukTranspos=[];
                foreach($fullProduk as $key=>$fp){
                    foreach($fp as $k=>$fpx){
                        $fullProdukTranspos[$k][$key] = $fpx;
                    }
                }

            }

                    if ($result_userExist!=null) {
                        //menghitung similarity tiap produk
                        $sim = $this->getSimilarities($fullProdukTranspos);

                        $final = $this->main($user, $sim, $fullProdukTranspos);  
                        $collect = collect($final);

                        $sorted = $collect->sortByDesc('hasil');

                        $recommend = $sorted->values()->all();

                        // echo json_encode ($recommend);   
                        // die();
                                                
                        if ($final == 0) {
                            $produk = "none";
                        } else {
                            $idProduk = [];
                            $i = 0;
                            foreach ($recommend as $value) {
                                if(++$i > 10) break;
                                array_push($idProduk, $value['id_produk']);
                            }
                            

                            $produk = Produk::whereIn('id', $idProduk)->limit(10)->get();
                            // return $produk;
                        }

                        $data = [
                            'produk'=>$produk,
                            'terlaris'=>$terlaris,
                            'notif'=>$this->getStatusUser(),
                        ];

                        return view('pembeli.home', $data);

                    }

                } 
                


                // dd($terlaris);
                $data = [
                    'produk'=>$produk,
                    'terlaris'=>$terlaris,
                    'notif'=>$this->getStatusUser(),
                ];
                return view('pembeli.home', $data);


    
            }

    public function getStatusUser(){
        if (Auth::check()) {
            $user = User::where('id', Auth::user()->id)->first();

            $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[3,4,5,7])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
            // dd($notif);
            return $notif;

        }



    }
    public function getStatusAdmin(){
        $user = User::where('id', Auth::user()->id)->first();
    
        $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[2,3,6])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    }

}


