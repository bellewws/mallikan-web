<?php

namespace App\Http\Controllers;
use App\KategoriProduk;
use App\JenisProduk;
use App\Toko;
use App\Produk;
use App\Transaksi;
use DB;
use Illuminate\Http\Request;
use Auth;
use File;
use Storage;

class ProdukTokoController extends Controller
{
    public function welcome()
    {
        return view('toko.produk.welcome');
    }
    public function getStatus(){
        $toko = Toko::where('id_user', Auth::user()->id)->first();

        $notif = Transaksi::where('id_toko',$toko->id, 'and')->whereIn('id_status',[3,6,8])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    }
    
    public function index()
    {
        $user = Auth::user()->id;
        $jenis = JenisProduk::get();
        $kategori = KategoriProduk::get();
        $toko = Toko::get();
        $produks = Produk::where('id_user', $user)->with(['jenis', 'toko'])->orderBy('id')->get();
    

        $data = [
            'user' => $user,
            'jenis' => $jenis,
            'kategori' => $kategori,
            'produks' => $produks,
            'notif'=>$this->getStatus(),

        ];

        return view('toko.produk.index', $data);
    }
   

    public function create()
    {
        $user = \Auth::user();

        $jenis = JenisProduk::all();
        $kategori = KategoriProduk::all();
        $data = [
            'jenis'=>$jenis,
            'kategori'=>$kategori,
            'user'=>$user,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.produk.create', $data);
    }

    public function store(Request $request)
    {
        $jenis = new Produk();

        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();

        $jenis->id_kategori = $request->input('id_kategori');
        $jenis->id_jenis = $request->input('id_jenis');
        $jenis->harga = $request->input('harga');
        $jenis->deskripsi = $request->input('deskripsi');
        $jenis->jumlah_stok = $request->input('jumlah_stok');
        $jenis->id_user = $user;
        $jenis->id_toko = $toko->id;
        $jenis->terjual = 0;


        if($request->input('radio_jenis') != null){
            $path = storage_path('app/admin/produk/jenis/'.$request->input('radio_jenis'));
            $dir = public_path('app/user/toko/'.$toko->id.'/'.'foto_produk/');
            // $directory = File::makeDirectory(base_path().'app/public/user/toko/'.$toko->id.'/'.'foto_produk/');
            $directory = File::makeDirectory($dir, 0777, true, true);
            
            
            $success = \File::copy(public_path('admin/produk/jenis/'.$request->input('radio_jenis')),public_path('user/toko/'.$toko->id.'/'.'foto_produk/'.$request->input('radio_jenis')));
            
            $jenis->foto_produk = $request->input('radio_jenis');

        }else if ($request->hasFile('foto_produk')){
            $file = $request->file('foto_produk');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('user/toko/'.$toko->id.'/'.'foto_produk/',$filename);
            $jenis->foto_produk = $filename;
        }
        else {
            return $request;
            $jenis->foto_produk = '';
        }

        $jenis->save();

        return redirect()->route('produk_index');
        
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $produk = Produk::find($id);
        $jenis = JenisProduk::all();
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $kategori = KategoriProduk::all();        
        $data = [
            'produk'=>$produk,
            'jenis'=>$jenis,
            'kategori'=>$kategori,
            'toko'=>$toko,
            'notif'=>$this->getStatus(),

        ];
        return view('toko.produk.edit', $data);
    }

    public function update(Request $request, $id)   
    {
        $id = decrypt($id);   
        $produk = Produk::find($id);
        $user = Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $jenis = JenisProduk::all();
        $kategori = KategoriProduk::all(); 

        $produk->id_kategori = $request->input('id_kategori');
        $produk->id_jenis = $request->input('id_jenis');
        $produk->harga = $request->input('harga');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->jumlah_stok = $request->input('jumlah_stok');
        $produk->id_user = $user;
        $produk->id_toko = $toko->id;


        if($request->input('radio_jenis') != null){
            $path = storage_path('app/public/admin/produk/jenis/'.$request->input('radio_jenis'));

            $success = \File::copy(public_path('admin/produk/jenis/'.$request->input('radio_jenis')),public_path('user/toko/'.$toko->id.'/'.'foto_produk/'.$request->input('radio_jenis')));
            
            $produk->foto_produk = $request->input('radio_jenis');

        }else if ($request->hasFile('foto_produk')){
            $file = $request->file('foto_produk');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('user/toko/'.$toko->id.'/'.'foto_produk/',$filename);
            $produk->foto_produk = $filename;
        }
        $produk->save();        

        $data = [
            'produk'=>$produk,
            'jenis'=>$jenis,
            'kategori'=>$kategori,
            'toko'=>$toko,
            'notif'=>$this->getStatus(),

        ];

        return redirect()->route('produk_index')->with('produk', $produk);
    }

    public function delete($id)
    {
        DB::table('produks')->where('id',$id)->delete();
        return redirect()->route('produk_index');

    }
}
