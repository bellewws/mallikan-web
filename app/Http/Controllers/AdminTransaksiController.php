<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Produk;
use DB;



class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function konfirmasi()
    {
        $konfirmasi = Transaksi::where('id_status',2)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->OrderBy('id')->get();
        
        // $konfirmasi = Transaksi::find($id);
        // $konfirmasi->id_status = 2;
        // $konfirmasi->save();

        // $produk = Produk::where('id', $konfirmasi->produk->id)->first();
        // $produk->jumlah_stok = $produk->jumlah_stok - $konfirmasi->jumlah;
        // $produk->save();
        $data = [
            'konfirmasi'=>$konfirmasi,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.transaksi.menunggu-konfirmasi', $data);
    }

    

    public function batal($id)
    {
        $konfirmasi = Transaksi::where('id', $id)->update([
            'id_status'=> 8
        ]);
        return redirect()->route('show_transaksi_menunggu_konfirmasi')->with('konfirmasi', $konfirmasi);
    }

    public function berhasil($id)
    {
        $konfirmasi = Transaksi::where('id', $id)->update([
            'id_status'=> 3
        ]);
        return redirect()->route('show_transaksi_menunggu_konfirmasi')->with('konfirmasi', $konfirmasi);
    }

    public function showproses()
    {
        $trans = Transaksi::with(['status'])->whereIn('id_status', [3,4,5])->get();
        $data = [
            'trans'=>$trans,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.transaksi.sedang-proses', $data);
    }

    public function showselesai()
    {
        $trans = Transaksi::with(['status'])->where('id_status', 10)->get();
        $data = [
            'trans'=>$trans,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.transaksi.transaksi-selesai', $data);
    }

    public function pembayaranAll()
    {
        $trans = Transaksi::with(['status'])->whereIn('id_status', [6])->get();
        $data = [
            'trans'=>$trans,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.transaksi.pembayaran-penjual', $data);

    }

    public function transferInsert($id)
    {
        $trans = Transaksi::where('id', $id)->update([
            'id_status'=> 10
        ]);       
        return back();
 
    }

    public function getStatusAdmin(){
        $notif = Transaksi::whereIn('id_status',[2,3,6])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        return $notif;
    }
    

    
}
