<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\KategoriProduk;
use App\JenisProduk;
use App\Toko;
use App\Produk;
use App\User;
use App\AlamatUser;
use App\StatusPembelian;
use App\Province;
use App\City;
use App\Message;
use DB;

use Auth;
use App\Transaksi;

class PembeliDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function getStatusUser(){
        $user = User::where('id', Auth::user()->id)->first();

        $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[3,4,5,7])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    }

    public function showall()
    {
        $user = Auth::user();
        $pesanan = Transaksi::where('id_user', $user->id)->whereNotIn('id_status', [1,8,9,10])->with(['jenis', 'kategori', 'toko', 'produk', 'status'])->get();
        $data = [
            'pesanan'=>$pesanan,
            'notif'=>$this->getStatusUser(),
        ];
        // dd($pesanan);

        return view('pembeli.pesanan.semua', $data);
    }

    public function showbatal()
    {
        $user = Auth::user();
        $pesanan = Transaksi::where('id_status',7)->where('id_user', $user->id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->with(['status'])->get();

        $data = [
            'pesanan'=>$pesanan,
            'notif'=>$this->getStatusUser(),
        ];
        // dd($pesanan);

        return view('pembeli.pesanan.pesanan-batal', $data);
    }

    public function showselesai()
    {
        $user = Auth::user();
        $pesanan = Transaksi::where('id_status',6)->where('id_user', $user->id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->with(['status'])->with(['comments'])->get();
        $data = [
            'pesanan'=>$pesanan,
            'notif'=>$this->getStatusUser(),
        ];
        
        // dd($data);

        return view('pembeli.pesanan.pesanan-selesai', $data);
    }

    public function show()
    {
        $user = Auth::user();
        $pesanan = Transaksi::where('id_status',9)->where('id_user', $user->id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->with(['status'])->get();

        $data = [
            'pesanan'=>$pesanan,
            'notif'=>$this->getStatusUser(),
        ];
        return view('pembeli.pesanan.belum-bayar',$data);
    }

    public function showdikemas()
    {
        $user = Auth::user();
        $pesanan = Transaksi::where('id_status',4)->where('id_user', $user->id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->with(['status'])->get();

        $data = [
            'pesanan'=>$pesanan,
            'notif'=>$this->getStatusUser(),
        ];
        // dd($pesanan);

        return view('pembeli.pesanan.dikemas', $data);
    }

    public function batal(Request $request, $id)
    {
        $pesanan = Transaksi::find($id);
        $pesanan->id_status = 8;
        $pesanan->save();
        return redirect()->route('show_pesanan_batal')->with('pesanan',$pesanan);
    }

    public function showdikirim()
    {
        $user = Auth::user();
        $pesanan = Transaksi::where('id_status',5)->where('id_user', $user->id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->with(['status'])->get();
        $data = [
            'pesanan'=>$pesanan,
            'notif'=>$this->getStatusUser(),
        ];
        // dd($data);

        return view('pembeli.pesanan.dikirim', $data);
    }

    public function diterima(Request $request, $id)
    {
        $pesanan = Transaksi::find($id);
        $pesanan->id_status = 6;
        $produk = Produk::where('id', $pesanan->id_produk)->first();
        $produk->terjual = $produk->terjual+1;
        // dd($produk);
        $pesanan->save();
        $produk->save();
        return redirect()->route('show_pesanan_selesai')->with('pesanan',$pesanan);
    }

    public function showorder($id)
    {
        
        $konfirmasi = Transaksi::where('id',$id)->with(['jenis', 'kategori', 'toko', 'produk', 'alamat', 'user'])->first();
        // $alamat = AlamatUser::where('id_user', $user->id)->with(['cities'])->first();
        // dd($konfirmasi);
        $data = [
            // 'user'=>$user,
            'k'=>$konfirmasi,
            // 'alamat'=>$alamat,
            'notif'=>$this->getStatusUser(),
        ];
        return view('pembeli.pesanan.order-detail',$data);
    }


    public function showprofile(){
        $user = Auth::user()->id;
        $users = User::where('id',$user)->first();
        $alamat = AlamatUser::where('id_user', $user)->with('provinces')->with('cities')->first();
        $data = [
            'user' =>$user,
            'users' =>$users,
            'alamat' =>$alamat,
            'notif'=>$this->getStatusUser(),
        ];

        return view('pembeli.profile.index', $data);
    }

    public function edit($id){
        $user = User::find($id);
        $data = [
            'user' =>$user,
            'notif'=>$this->getStatusUser(),
        ];

        return view('pembeli.profile.edit', $data);
    }

    public function update(Request $request, $id){
        $id = decrypt($id);
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->no_kontak = $request->input('no_kontak');

        $user->save();
        $data = [
            'user' =>$user,
            'notif'=>$this->getStatusUser(),
        ];
        return redirect()->route('show_profile')->with('user',$user)->with('notif',$this->getStatusUser());


    }

}
