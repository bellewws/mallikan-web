<?php

namespace App\Http\Controllers;
use Auth;
use App\Admin;
use App\KategoriProduk;
use App\JenisProduk;
use App\Toko;
use App\Produk;
use App\Pembayaran;
use App\Transaksi;
use DB;
use App\User;
use Illuminate\Http\Request;
use File;
use Storage;


class AdminController extends Controller
{
    public function index(){
        $transactions= Transaksi::with(['user','toko','produk','jenis','kategori','status','alamat'])->get();
        // dd($transactions);
        // return view('admin.indexnew',compact('transactions'));
        // $notif = Transaksi::where('id_status',2)->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // $notif = Transaksi::where('id_status',2)->with(['jenis','kategori','toko','produk'])->get();
        $data = [
            'notif'=>$this->getStatusAdmin(),
            'transactions'=>$transactions,
        ];
        // dd($data);
        return view('admin.indexnew', $data);
    }

    public function getStatusAdmin(){
        $notif = Transaksi::whereIn('id_status',[2,3,6])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        return $notif;

        // $user = User::where('id', Auth::user()->id)->first();
    
        // $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[2,3,6])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
    }


    public function showbarcode(){
        $barcode = Pembayaran::first();
        $data = [
            'barcode'=>$barcode,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.barcode.index', $data);
    }

    public function create(){
        $data = [
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.barcode.create',$data);
    }

    public function insert(Request $request)
    {
        $barcode = new Pembayaran();

        $barcode->nomor = $request->input('nomor');
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/barcode', $filename);
            $barcode->foto = $filename;
        } else {
            return $request;
            $barcode->foto = '';
        }
        $barcode->save();
        return redirect()->route('show_barcode_admin')->with('barcode', $barcode);
    }

    public function edit($id){
        $barcode = Pembayaran::find($id);
        $data = [
            'barcode'=>$barcode,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.barcode.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $barcode = Pembayaran::find($id);

        $barcode->nomor = $request->input('nomor');
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/barcode', $filename);
            $barcode->foto = $filename;
        } 
        $barcode->save();
        $data = [
            'barcode'=>$barcode,
            'notif'=>$this->getStatusAdmin(),
        ];
        return redirect()->route('show_barcode_admin')->with('barcode', $barcode)->with('notif',$data);
    }

    public function product(){
        $user = Auth::user()->id;
        $jenis = JenisProduk::get();
        $kategori = KategoriProduk::get();
        $toko = Toko::get();
        $produk = Produk::get();

        $produks = DB::table('produks')
        ->select('produks.id as id','kategori_produks.kategori as kategori','jenis_produks.jenis as jenis','tokos.name as nama_toko', 'tokos.id as id_toko', 'produks.jumlah_stok as jumlah_stok', 'produks.harga as harga', 'produks.foto_produk as foto')
        ->join('kategori_produks','produks.id_kategori','=','kategori_produks.id')
        ->join('jenis_produks', 'produks.id_jenis','=','jenis_produks.id')
        ->join('tokos', 'tokos.id','=','produks.id_toko')
        ->paginate(3);

        $data = [
            'user' => $user,
            'jenis' => $jenis,
            'kategori' => $kategori,
            'produks' => $produks,
            'produk' => $produk,
            'notif'=>$this->getStatusAdmin(),
        ];

        return view('admin.products.index', $data);
    }

    public function getUser()
    {
        $user = User::get();
        $data = [
            'user'=>$user,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.user', $data);

    }

    public function getToko()
    {
        $toko = Toko::with(['user'])->get();
        $data = [
            'toko'=>$toko,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.toko', $data);

    }
}
