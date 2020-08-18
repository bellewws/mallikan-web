<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use DB;
use App\KategoriProduk;
use App\JenisProduk;
use App\Toko;
use App\Produk;
use App\Comment;
use App\City;
use App\User;
use App\Transaksi;
use Auth;



class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function shop()
    {
        return view('detail.shop');
    }

    public function getStatusUser(){
        if (Auth::check()) {

            $user = User::where('id', Auth::user()->id)->first();

        $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[3,4,5,7])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
        }
    }

    public function toko($id)
    {
        $produk = Produk::where('id_toko', $id)->get();
        $toko = Toko::where('id', $id)->with(['kota'])->first();
        // dd($toko);       

        $data = [
            'toko' => $toko,
            'produk' => $produk,
 
            'notif'=>$this->getStatusUser(),
        ];

        return view('detail.toko', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $produk = Produk::get();

        $kota = City::where('province_id', 6)->get();

        $data = [
            'produk'=>$produk,
            'kota'=>$kota,
            'notif'=>$this->getStatusUser(),
        ];

        // dd($data);

        return view('pembeli.produk-all', $data);

    }

    public function showkategori(Request $request, $kategori)
    {
        // dd($kategori);
        $sort = request()->sort;
        $kota_toko = request()->kota_toko;
        $rating = request()->rating;
        // dd($sort);
        $harga = request()->harga; 

        $kategori = $request->route('kategori');
        $id_kategori = KategoriProduk::where('kategori', $kategori)->first();
        $produks = Produk::where('id_kategori', $id_kategori->id)->with(['jenis']);
        $kota = City::where('province_id', 6)->get();

        if($sort != ""){
            switch($sort){
                case "terbaru":
                $produks = $produks->orderBy('created_at');
                break;
        
                case "terlaris":
                $produks = $produks->orderByDesc('terjual');
                // $produks = $produks->join('transaksis', 'transaksis.id_produk', 'produks.id')
                // ->groupBy('produks.id', 'transaksis.id')->orderByRaw('count(transaksis.id_produk)')->get();

                // return $produks;

                // $a = Produk::where('produks.id_kategori', $a->id)->join('transaksis', 'transaksis.id_produk', 'produks.id')->groupBy('produks.id', 'transaksis.id_produk')->orderBy(DB::raw('count(transaksis.id_produk)', 'desc')->get();

                // $a = Produk::where('produks.id_kategori', $a->id)->
                // join('transaksis', 'transaksis.id_produk', 'produks.id')->
                // groupBy('produks.id', 'transaksis.id_produk', 'transaksis.id')->
                // orderByRaw('count(transaksis.id_produk)')
                // ->get();

                // return $a;

                // $c = Transaksi::select('id_produk',DB::raw('COUNT(id_produk) as terjual'))->groupby('id_produk')->orderbyraw('COUNT(id_produk) desc')->get();
                // return $c;

                        
                // $cc = [];
                // foreach ($c as $r) {
                //     array_push($cc, $r->id_produk);
                // }
                // dd($cc);

                // $string = 'FIELD(id,';
                // foreach ($c as $key=>$p) {
                //     $string = $string.$p->id_produk;
                //     if ($key == sizeof($c)-1) {
                //         $string = $string.')';
                //     }
                //     else {
                //         $string = $string.',';
                //     }
                    
                // }
                // return $string;

                // $v = Produk::whereIn('id', $cc)->orderByRaw($string)->get();
                // $b = $v->
                // return $v;   
                // ->orderBy('produks.id');

                // select id_produk, id_toko, COUNT(id_produk)  from transaksis where id_kategori = 1 group by id_produk, id_toko order by count(id_produk) desc ;

                // $string = 'FIELD("id",';
                // foreach ($produk_select as $key=>$p) {
                //     $string = $string.$p->id_produk;
                //     if ($key == sizeof($produk_select)-1) {
                //         $string = $string.')';
                //     }
                //     else {
                //         $string = $string.',';
                //     }
                    
                // }
                // return $produks;
                // return $b;
                // dd($produks);
                // $produks = $produks->orderByRaw($string);


                //nampung urutan produk
                //get produk, order by disesuaikan
            

                // return $produk_select;


                break;

                // select id_produk, COUNT(id_produk)  from transaksis group by id_produk order by count(id_produk) desc;

                case "tertinggi":
                $produks = $produks->orderByDesc('harga');
                break;

                case "terendah":
                $produks = $produks->orderBy('harga');
                break;
            }
        }

        //kota
        if($kota_toko != ""){
            $toko = Toko::where('id_kota', $kota_toko)->get();
            // dd($toko);
            $toko_result = [];
            foreach ($toko as $r) {
                array_push($toko_result, $r->id);
            }
            $produks = $produks->whereIn('id_toko', $toko_result);
        }

        //harga produk
        if ($harga != "") {
            if ($harga != 51000) {
                $harga = explode("-", $request->harga);
                $start = $harga[0];
                $end = $harga[1];

                $produks = $produks->whereBetween('harga', [$start, $end]);

                // dd($produks);
            } else {
                $start = $harga;
                $produks = $produks->where('harga', '>=', $harga);
                // dd($produks);
            }
        }

        //rating
        if($rating != ""){
            $rating_plus = $rating+1;
            $trans = Transaksi::select(DB::raw('id_produk, avg(rating)'))
            ->groupBy('id_produk')
            ->havingRaw('avg(rating) BETWEEN '.$rating.' AND '.$rating_plus)
            ->get();
    
            $result_rating = [];
            foreach ($trans as $r) {
                array_push($result_rating, $r->id_produk);
            }
    
            $produks =$produks->whereIn('id', $result_rating);
        }

        $rating_produk = Transaksi::select(DB::raw('id_produk, avg(rating)'))
        ->groupBy('id_produk')
        ->get();
        // return ($rating_produk);

        $produks = $produks->paginate(12);
        // dd($produks);

        $rating_option = [5,4,3,2,1];

        $data = [
            'produks' => $produks,
            'kategori' => $kategori,
            'kota' => $kota,
            'kota_toko' => $kota_toko,
            'sort' => $sort,
            'rating' => $rating,
            'rating_option' => $rating_option,
            'harga' => $harga,
            'notif'=>$this->getStatusUser(),

        ];
        // return ($produks);
        return view('pembeli.produk-list', $data);
    }

    public function detail(Request $request, $id)
    { 
        $produk = Produk::where('id', $id)->with(['toko','comments'])->first();
        $komen_id = [];
        foreach ($produk->comments as $c) {
            array_push($komen_id, $c->id);
        }
        // return $komen_id;
        $produks = Comment::where('produk_id', $id)->with(['user','transaksi','replies','toko','transaksi'])->whereIn('id', $komen_id)->paginate(2);
        $jenis = JenisProduk::where('id', $produk->id_jenis)->first();
        $kota = City::where('city_id', $produk->toko->id_kota)->first();
        $transaksi = Transaksi::where('id_produk', $id)->get();
        $rating = $transaksi->avg('rating');
        $terjual = $transaksi->count();
        $komen = Comment::where('produk_id', $id)->with(['user','transaksi','replies'])->groupby('produk_id','id')->paginate(4);
        $other_prod = Produk::where('id_jenis', $produk->id_jenis)->whereNotIn('id', [$produk->id])->with(['jenis'])->get();
        

        $data = [ 
            'produk'=>$produk,
            'produks'=>$produks,
            'other_prod'=>$other_prod,
            'jenis'=>$jenis,
            'kota'=>$kota,
            'rating'=>$rating,
            'terjual'=>$terjual,
            'transaksi'=>$transaksi,
            // 'comment'=>$comment,
            'notif'=>$this->getStatusUser(),
            'komen'=>$komen
            // 'toko'=>$toko
        ];
        // dd($rating);
        // die();
        return view('pembeli.produk-detail', $data);

    }

    function fetch_data(Request $request, $id)
    {
        if($request->ajax())
        {
            $produk = Produk::where('id', $id)->with(['toko','comments'])->first();
        $komen_id = [];
        foreach ($produk->comments as $c) {
            array_push($komen_id, $c->id);
        }

        $komen = Comment::where('produk_id', $id)->with(['user','transaksi','replies','toko','transaksi'])->whereIn('id', $komen_id)->paginate(2);
            // dd($komen);
            return view('pembeli.comment', compact('komen'))->render();
        }
    }

    public function search(Request $request) 
    {
        // menangkap data pencarian
        $cari = $request->cari;
            
        $sort = request()->sort;
        $kota_toko = request()->kota_toko;
        // dd($kota_toko);
        $harga = request()->harga;
        $rating = request()->rating;

        $result_id = [];

        if ($cari != "") {
            $result = JenisProduk::where('jenis','like',"%".$cari."%")->get();
            
            foreach ($result as $r) {
                array_push($result_id, $r->id);
            }
        }
        $produks = Produk::whereIn('id_jenis', $result_id)->with(['jenis']);

        if($sort != ""){
            switch($sort){
                case "terbaru":
                $produks = $produks->orderBy('created_at');
                break;
        
                case "terlaris":
                $produks = $produks->orderByDesc('terjual');
                break;

                case "tertinggi":
                $produks = $produks->orderByDesc('harga');
                break;

                case "terendah":
                $produks = $produks->orderBy('harga');
                break;
            }
        }

        //kota
        if($kota_toko != ""){
            $toko = Toko::where('id_kota', $kota_toko)->get();
            $toko_result = [];
            foreach ($toko as $r) {
                array_push($toko_result, $r->id);
            }
            $produks = $produks->whereIn('id_toko', $toko_result);
        }

        //harga produk
        if ($harga != "") {
            if ($harga != 51000) {
                $harga = explode("-", $request->harga);
                $start = $harga[0];
                $end = $harga[1];

                $produks = $produks->whereBetween('harga', [$start, $end]);

                // dd($produks);
            } else {
                $start = $harga;
                $produks = $produks->where('harga', '>=', $harga);
                // dd($produks);
            }
        }

        //rating
        if($rating != ""){
            $rating_plus = $rating+1;
            $trans = Transaksi::select(DB::raw('id_produk, avg(rating)'))
            ->groupBy('id_produk')
            ->havingRaw('avg(rating) BETWEEN '.$rating.' AND '.$rating_plus)
            ->get();
    
            $result_rating = [];
            foreach ($trans as $r) {
                array_push($result_rating, $r->id_produk);
            }
    
            $produks =$produks->whereIn('id', $result_rating);
        }

        $produks = $produks->paginate(12);
        
        // return $result->id_kategori;

        $kota = City::where('province_id', 6)->get();
        $rating_option = [5,4,3,2,1];

        // dd($produk);

        $data = [
            'cari'=>$cari,
            'produks'=>$produks,
            'kota'=>$kota,
            'kota_toko' => $kota_toko,
            'sort' => $sort,
            'rating' => $rating,
            'rating_option' => $rating_option,
            'harga' => $harga,
            'notif'=>$this->getStatusUser(),
        ];

        return view('pembeli.produk-all', $data);
        // return redirect()->route('show_kategori', ['kategori' => $result_kategori]);

    }

    public function filter(Request $request)
    {
        // return $request;

        $id_cat = $request->id;
        $kota = $request->kota;
        $rating = $request->rating;
        $harga = $request->harga;
        $search = $request->search;

        //kota
        $result = Toko::where('id_kota', $kota)->get();
        $result_kota = [];
            foreach ($result as $r) {
                array_push($result_kota, $r->id);
            }

        //rating
        $trans = Transaksi::select(DB::raw('id_produk, avg(rating)'))
        ->groupBy('id_produk')
        ->havingRaw('avg(rating) >='.$rating)
        ->get();

        $result_rating = [];
        foreach ($trans as $r) {
            array_push($result_rating, $r->id_produk);
        }

        //harga produk
        if ($harga != 51000) {
            $harga = explode("-", $request->harga);
            $start = $harga[0];
            $end = $harga[1];

            $produks = Produk::whereBetween('harga', [$start, $end])->get();

            // dd($produks);
        } else {
            $start = $harga;
            $produks = Produk::where('harga', '>=', $harga)->get();
            // dd($produks);
        }

        //set filtering
        // 1. kota, rating, harga
        // 2. kota, rating v
        // 3. kota, harga
        // 4. rating, harga
        if (isset($kota) && isset($rating)) {
            $produks = Produk::whereIn('id', $result_rating)->whereIn('id_toko', $result_kota)
            ->where('id_kategori', $id_cat)
            ->get();
            dd($produks);

        } elseif (isset($kota) && isset($harga)) {
            //kota
           $result = Toko::where('id_kota', $kota)->get();

           $result_kota = [];
           foreach ($result as $r) {
               array_push($result_kota, $r->id);
           }
           //harga


        } elseif (isset($kota) && isset($rating) && isset($harga)) {
           //kota
           $result = Toko::where('id_kota', $kota)->get();

           $result_kota = [];
           foreach ($result as $r) {
               array_push($result_kota, $r->id);
           }

           //rating produk
           $trans = Transaksi::select(DB::raw('id_produk, avg(rating)'))
           ->groupBy('id_produk')
           ->havingRaw('avg(rating) >='.$rating)
           ->get();

            $result_rating = [];
            foreach ($trans as $r) {
                array_push($result_rating, $r->id_produk);
            }

           

           $produks = Produk::whereIn('id', $result_rating)->whereIn('id_toko', $result_kota)->get();

        } elseif (isset($kota)){
            $result = Toko::where('id_kota', $kota)->get();

            $result_id = [];
            foreach ($result as $r) {
                array_push($result_id, $r->id);
            }

            $produks = Produk::select('id_toko')->whereIn('id_toko', $result_id)->get();
            // dd($produks);

        } elseif (isset($rating)){
            $trans = Transaksi::select(DB::raw('id_produk, avg(rating)'))
            ->groupBy('id_produk')
            ->havingRaw('avg(rating) >='.$rating)
            ->get();

            $result_id = [];
            foreach ($trans as $r) {
                array_push($result_id, $r->id_produk);
            }

            $produks = Produk::whereIn('id', $result_id)->get();
        } elseif (isset($harga)) {
            if ($harga != 51000) {
                $harga = explode("-", $request->harga);
                $start = $harga[0];
                $end = $harga[1];

                $produks = Produk::whereBetween('harga', [$start, $end])->get();

                dd($produks);
            } else {
                $start = $harga;
                $produks = Produk::where('harga', '>=', $harga)->get();
                dd($produks);
            }
            
        }

        // dd($produk);

        // // $data = [ 
        // //     'produk'=>$produk,
        // // ];

        // return view('pembeli.produk-all', $produk);
    }

    
}
