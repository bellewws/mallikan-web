<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\AlamatUser;
use App\Produk;
use App\Message;
use App\Toko;
use DB;
use Auth;
use App\StatusPembelian;
use App\User;
use App\Comment;


class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [
            'notif'=>$this->getStatus(),
        ];
        // dd($data);
        return view('toko.index', $data);
    }

    public function getStatus(){
        $toko = Toko::where('id_user', Auth::user()->id)->first();

        $notif = Transaksi::where('id_toko',$toko->id, 'and')->whereIn('id_status',[3,6,8])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    }

    public function showall(){   
        $toko = Toko::where('id_user', Auth::user()->id)->first();
        $konfirmasi = Transaksi::where('id_toko',$toko->id)->whereIn('id_status', [3,5,6])->with(['jenis', 'kategori', 'toko', 'produk', 'status'])->orderby('id')->get();
        $data = [
            'konfirmasi'=>$konfirmasi,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.semua', $data);
    }

    public function showbatal()
    {
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $transaksi = Transaksi::where('id_status',8)->where('id_toko', $toko->id)->with(['jenis', 'kategori', 'toko', 'produk', 'status', 'comments'])->get();
        
        $data = [
            'transaksi'=>$transaksi,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.penjualan-batal',$data);
    }

    public function showselesai()
    {
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $transaksi = Transaksi::where('id_status',6)->where('id_toko', $toko->id)->where('id_toko', $toko->id)->with(['jenis', 'kategori', 'toko', 'produk', 'status', 'comments'])->orderby('id')->get();
        // echo json_encode($transaksi);
        // die();
        $data = [
            'transaksi'=>$transaksi,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.penjualan-selesai', $data);
    }

    public function show()
    {
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $konfirmasi = Transaksi::where('id_status',3)->where('id_toko', $toko->id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->with(['alamat'])->get();

        $data = [
            'konfirmasi'=>$konfirmasi,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.dibayar', $data);
    }

    public function batal($id)
    {
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $konfirmasi = Transaksi::where('id', $id)->update([
            'id_status'=> 8
        ]);
        return redirect()->route('show_penjualan_dibayar')->with('konfirmasi', $konfirmasi);
    }

    public function proses($id)
    {
        // $konfirmasi = Transaksi::where('id', $id)->update([
        //     'id_status'=> 4
        // ]);
        $konfirmasi = Transaksi::find($id);
        $konfirmasi->id_status = 4;
        $konfirmasi->save();

        $produk = Produk::where('id', $konfirmasi->produk->id)->first();
        $produk->jumlah_stok = $produk->jumlah_stok - $konfirmasi->jumlah;
        $produk->save();

        return redirect()->route('show_penjualan_diproses')->with('konfirmasi', $konfirmasi);
    }

    public function showdiproses()
    {
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $konfirmasi = Transaksi::where('id_status',4)->where('id_toko', $toko->id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();

        $data = [
            'konfirmasi'=>$konfirmasi,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.diproses', $data);
    }

    public function insertResi(Request $request, $id)
    {
        $insert = Transaksi::find($id);
        // $insert->resi_kurir = $request->input('resi');
        $insert->id_status = 5;

        $insert->save();

        return redirect()->route('show_penjualan_dikirim')->with('insert', $insert);

    }

    public function showdikirim()
    {
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $konfirmasi = Transaksi::where('id_status',5)->where('id_toko', $toko->id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();

        $data = [
            'konfirmasi'=>$konfirmasi,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.dikirim', $data);
    }

    public function showdetail($id)
    {
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $konfirmasi = Transaksi::where('id',$id)->where('id_toko', $toko->id)->with(['jenis', 'kategori', 'toko', 'produk', 'alamat', 'user'])->first();
        
        $data = [
            // 'user'=>$user,
            'k'=>$konfirmasi,
            // 'alamat'=>$alamat,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.penjualan-detail',$data);
    }

    public function showTransfer()
    {
        $trans = Transaksi::with(['status'])->whereIn('id_status', [10])->get();
        $data = [
            'trans'=>$trans,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.transfer-admin', $data);

    }
}
