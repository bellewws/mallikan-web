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
use Carbon;
use App\User;


class TransaksiController extends Controller
{
    public function store(Request $request, $id)
    {
        $transaksi = new Transaksi();

        $user = Auth::user()->id;

        $produk = Produk::find($id);


        $transaksi->id_user = $user;
        $transaksi->id_toko = $produk->id_toko;
        $transaksi->id_produk = $produk->id;
        $transaksi->id_jenis = $produk->id_jenis;
        $transaksi->id_kategori = $produk->id_kategori;
        $transaksi->id_status = 1;
        $transaksi->jumlah = $request->input('quant.1')*1000;
        $transaksi->biaya_ongkir = 0;
        $transaksi->subtotal = $request->input('quant.1')*$produk->harga;
        $transaksi->total_harga = $request->input('quant.1')*$produk->harga;
        // dd($transaksi);

        $transaksi->save();

        return redirect()->route('cart_index');
    }

    public function cart()
    {
        $user = Auth::user()->id;
        $alamat = AlamatUser::where('id_user', $user)->with(['cities'])->first();
        $provinces = Province::where('province_id', 6)->pluck('title', 'province_id')->first();
        $cities = City::where('province_id', 6)->get();
        $cart = Transaksi::where('id_user', $user)->where('id_status',1)->with(['jenis'])->with(['kategori'])->get();
        $data = [
            'user'=>$user,
            'cart'=>$cart,
            'alamat'=>$alamat,
            'provinces'=>$provinces,
            'cities'=>$cities,
            'notif'=>$this->getStatusUser(),
        ];
        // dd($provinces);
        // die();
        return view('pembeli.transaksi.cart', $data);

    }

    public function deletecart($id)
    {
        DB::table('transaksis')->where('id',$id)->delete();
        return redirect()->route('cart_index');

    }

    public function insertCheckOut(Request $request)
    {
      
        //GET USER
        $user = Auth::user();
        $cart = Transaksi::where('id_user', $user)->where('id',$id)->with(['jenis'])->with(['kategori'])->get();
        $alamat = AlamatUser::where('id_user', $user->id)->first();
        dd($cart);
        //GET DATA CART
        // $kota = Kota::all();
        // $kecamatan = Kecamatan::all();
        $input = $request->all();
        $trans = Transaksi::where('id_status', 1)->with(['toko'])->get();
        // foreach ($trans as $t) {
        //         if($request->input('txtChecked'.$t->id) != null){
        //             $find = Transaksi::where('id', $request->input('txtChecked'.$t->id))->update(['id_status'=>2]);       
        //         }   
        // }
        $produk = Transaksi::where('id_status', 2)->where('id_user', $user->id)->get();


        return redirect()->route('checkout');
    }

    public function checkOutIndex($id)
    {
        $user = Auth::user();
        $alamat = AlamatUser::where('id_user', $user->id)->with(['cities'])->first();
        $cart = Transaksi::where('id_user', $user->id)->where('id',$id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->first();
        $barcode = Pembayaran::first();
        //GET API RAJA ONGKIR
        $couriers = Courier::pluck('title', 'code');
        $provinces = Province::where('province_id', 6)->pluck('title', 'province_id');
        // $cities = City::where('province_id', 6)->pluck('title', 'city_id');
        $toko_cities = City::where('city_id', $cart->toko->id_kota)->pluck('title', 'city_id');
        $cities = City::where('city_id', $alamat->cities->city_id)->pluck('title', 'city_id');
        $citiess = City::where('province_id', 6)->get();
        // dd($citiess);


        $data = [
            'user'=>$user,
            'cart'=>$cart,
            'cities'=>$cities,
            'citiess'=>$citiess,
            'couriers'=>$couriers,
            'provinces'=>$provinces,
            'alamat'=>$alamat,
            'toko_cities'=>$toko_cities,
            'barcode'=>$barcode,
            'notif'=>$this->getStatusUser(),
        ];

            return view('pembeli.transaksi.checkout', $data);   
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }

    public function getService(Request $request)
    {
        $select = $request->select;
        $dependent = $request->select;

        
        $data = RajaOngkir::ongkosKirim([
            'origin'=>$request->city_origin,
            'destination'=>$request->city_destination,
            'weight'=>$request->weight,
            'courier'=>$request->courier
        ])->get();

        $output = '<option value="" selected></option>';
        foreach ($data[0]['costs'] as $row) {
            $output .= '<option value="' . $row['service'] . '">' . $row['service'] . '</option>';
        }
        return $output;
    }

    public function getLayanan(Request $request)
    {
        $select = $request->select;
        $dependent = $request->select;

        
        $data = RajaOngkir::ongkosKirim([
            'origin'=>$request->city_origin,
            'destination'=>$request->city_destination,
            'weight'=>$request->weight,
            'courier'=>$request->courier
        ])->get();
        dd($data);


        $output = '<option value="" selected>Pilih Layanan</option>';
        foreach ($data[0]['costs'] as $row) {
            $output .= '<option value="' . $row['service'] . '">' . $row['service'] . '</option>';
        }
    }


    public function submitCheckOut(Request $request, $id)
    {
        
        $user = Auth::user();
        $barcode = Pembayaran::first();
        // $cost = RajaOngkir::ongkosKirim([
        //     'origin'=>$request->city_origin,
        //     'destination'=>$request->city_destination,
        //     'weight'=>$request->weight,
        //     'courier'=>$request->courier,
            
        // ])->get();

        $tgl = Carbon\Carbon::now()->format('dym');
        $code = 'TRX'.str_replace('-','', $tgl);

        $cart = Transaksi::where('id_user', $user->id)->where('id',$id)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->first();
        $alamat = AlamatUser::where('id_user', $user->id)->first();

        // $cart = Transaksi::firstOrNew(['kode' => $code]);
        $cart->kode = $code;
        $cart->id_alamat = $alamat->id;
        $cart->id_status = 9; 
        $cart->jam_kirim = $request->jam_kirim;
        $cart->save();

        // dd($cart);
        if($request->input('kirim_nanti') != null){
            $kirim = Transaksi::where('id', $id)->update([
                'kirim_sekarang' => false,
                'tgl_kirim'=> $request->input('date_kirim_nanti')
                ]);

        }else {
            $kirim = Transaksi::where('id', $id)->update([
                'kirim_sekarang' => true,
                'tgl_kirim'=> Carbon\Carbon::now()
                ]);
        }

        $courier = Courier::where('code', $request->courier)->first();
        $cart = Transaksi::where('id', $id)->first();
        $insertkurir = Transaksi::where('id_user', $user->id)->where('id',$id)->update([
            // 'kurir'=>$request->input('courier'),
            'biaya_ongkir'=>$request->biaya_ongkir,
            'total_harga'=>$request->total_harga,
            
        ]);


        $data = [
            'user'=>$user,
            'courier'=>$courier,
            // 'cost'=>$cost,
            'cart'=>$cart,
            'barcode'=>$barcode,
            'tgl'=>$tgl,
            'code'=>$code,
            'notif'=>$this->getStatusUser(),
        ];
            // dd($courier);

        // dd($cost[0]['costs'][1]['cost'][0]['value']);
        // return redirect()->route('show_barcode', $id);
        return redirect()->route('bayar', [$cart->id]);

    }

    public function bayar($id)
    {
        $user = Auth::user();
        $pesanan = Transaksi::where('id',$id)->first();
        $alamat = AlamatUser::where('id_user', $user->id)->with(['cities'])->first();
        $barcode = Pembayaran::first();

        $data = [
            'user'=>$user,
            'pesanan'=>$pesanan,
            'alamat'=>$alamat,
            'barcode'=>$barcode,
            'notif'=>$this->getStatusUser()
        ];
        return view('pembeli.transaksi.scan-qr', $data); 
    }

    public function submitPesanan(Request $request, $id)
    {

        $pesanan = Transaksi::find($id);
        $user = Auth::user();
        $alamat = AlamatUser::where('id_user', $user->id)->with(['cities'])->first();

        // $pesanan->id_user = $user->id;
        // $pesanan->id_toko = $pesanan->toko->id;
        // $pesanan->id_produk = $pesanan->produk->id;
        // $pesanan->id_jenis = $pesanan->jenis->id;
        // $pesanan->id_kategori = $pesanan->kategori->id;
        // $pesanan->id_status = 2;
        // $pesanan->id_alamat = $alamat->id;
        // $pesanan->jumlah = $pesanan->jumlah;
        // $pesanan->kode = $pesanan->kode;
        // $pesanan->subtotal = $request->sub_total;
        // $pesanan->tgl_kirim = $pesanan->tgl_kirim;
        // $pesanan->biaya_ongkir = $pesanan->display_ongkir;
        // $pesanan->total_harga = $request->total;
        $pesanan->id_status = 2; 

        $pesanan->save();

        return redirect()->route('show_konfirmasi');

    }

    public function showKonfirmasi()
    {
        $data = [
            'notif'=>$this->getStatusUser(),
        ];
        return view('pembeli.transaksi.konfirmasi', $data);
    }

    public function getServiceExample(Request $request) {

        $data = RajaOngkir::ongkosKirim([
            'origin'=>$request->origin,
            'destination'=>$request->destination,
            'weight'=>$request->weight,
            'courier'=> $request->courier
        ])->get();

        $output = '<option value="" selected>Pilih Layanan</option>';
        foreach ($data[0]['costs'] as $row) {
            $output .= '<option value="' . $row['cost'][0]['value'] . '">' . $row['service'] . ' ' . $row['cost'][0]['etd'] . ' Hari</option>';
        }

        return $output;
    }

    public function getStatusUser(){

        $user = User::where('id', Auth::user()->id)->first();

        $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[3,4,5,7])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    
    }
}
