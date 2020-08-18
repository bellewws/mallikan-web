<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toko;
use App\Produk;
use App\JenisProduk;
use App\KategoriProduk;
use App\Transaksi;
use App\Province;
use App\City;
use App\Courier;
use App\AlamatUser;
use App\Pembayaran;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Auth;
use App\StatusPembelian;
use DB;
use Carbon\Carbon;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user = Auth::user();
        $toko = Toko::where('id_user', $user->id)->first();
        $id_toko = $toko->id;

        $transaksis = Transaksi::select(DB::raw('sum(total_harga) as total , extract(month from updated_at) as month, extract(year from updated_at) as year'))
        ->where('id_toko',$id_toko)
        ->where('id_status',6)
        ->groupBy(DB::raw('extract(month from updated_at), extract(year from updated_at)'))
        ->get();

        $value = [];
        $label = [];

        foreach($transaksis as $t){
            array_push($value, $t->total);
            array_push($label, "Bulan ke-".$t->month."tahun".$t->year );
        }

        $value = json_encode($value);
        $label = json_encode($label);

        $total = Transaksi::select(DB::raw('count(transaksis.id) as jmlh , sum(subtotal) as subtotal,
        extract(month from transaksis.updated_at) as bulan, extract(year from transaksis.updated_at) as tahun'))
        ->leftjoin('kategori_produks','transaksis.id_kategori','=','kategori_produks.id')
        ->where('id_toko',$id_toko)
        ->where('id_status',6)
        ->groupBy(DB::raw('extract(month from transaksis.updated_at), extract(year from transaksis.updated_at)'))
        ->get();
        // echo ($sum);
        $jml = [];
        $month = [];
        $sum = [];
        // $cat = [];
        // dd($jml);
        foreach($total as $tot){
            array_push($jml, $tot->jmlh);
            array_push($month, "Bulan ke- ".$tot->bulan." tahun ".$tot->tahun);
            array_push($sum, $tot->subtotal);
            // array_push($cat, $tot->kategori);
        }

        $jml = json_encode($jml);
        $month = json_encode($month);
        $sum = json_encode($sum);
        // $cat = json_encode($cat);
                // dd($month);


        $data = [
            'value'=>$value,
            'label'=>$label,
            'transaksis'=>$transaksis,
            'total'=>$total,
            'jml'=>$jml,
            'month'=>$month,
            'sum'=>$sum,
            // 'cat' =>$cat,
            'notif'=>$this->getStatus(),
        ];

        return view('toko.penjualan.chart',$data);
        
    }

    public function showTable(){
        $user = Auth::user();
        $toko = Toko::where('id_user', $user->id)->first();
        $id_toko = $toko->id;

        $konfirmasi= Transaksi::select(DB::raw('count(transaksis.id) as jmlh, sum(subtotal) as sum, jenis_produks.jenis as jenis, extract(month from transaksis.updated_at) as bulan, extract(year from transaksis.updated_at) as tahun'))
        ->leftjoin('jenis_produks','transaksis.id_jenis','=','jenis_produks.id')
        ->where('id_toko',$id_toko)
        ->where('id_status',6)
        ->orderBy(DB::raw('extract(month from transaksis.updated_at), extract(year from transaksis.updated_at)'))
        ->groupBy(DB::raw('extract(month from transaksis.updated_at), extract(year from transaksis.updated_at), jenis_produks.jenis'))
        ->get();
        $data = [
            'konfirmasi'=>$konfirmasi,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.penjualan.chart-table', $data);
    }
    
    public function getStatus(){
        $toko = Toko::where('id_user', Auth::user()->id)->first();

        $notif = Transaksi::where('id_toko',$toko->id, 'and')->whereIn('id_status',[3,6,8])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    }
}
