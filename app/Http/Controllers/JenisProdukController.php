<?php

namespace App\Http\Controllers;
use App\KategoriProduk;
use App\JenisProduk;
use Illuminate\Http\Request;
use App\Transaksi;
use DB;


class JenisProdukController extends Controller
{
    public function index()
    {
        // $jenis = DB::table('jenis_produks')->get();
        $kategori = KategoriProduk::all();
        $jenis = DB::table('jenis_produks')
        ->select('jenis_produks.id as id','jenis_produks.jenis','jenis_produks.id_kategori','jenis_produks.foto_jenis','kategori_produks.kategori as kategori_produk', 'jenis_produks.created_at')
        ->leftJoin('kategori_produks','jenis_produks.id_kategori','=','kategori_produks.id')->orderby('jenis_produks.id')->get();
        $data = [
            'jenis'=>$jenis,
            'kategori'=>$kategori,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.products.jenis', $data);
    }
    public function add()
    {
        $jenis = DB::table('jenis_produks')->get();
        $kategori = KategoriProduk::all();
        $data = [
            'jenis'=>$jenis,
            'kategori'=>$kategori,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.products.jenis-create', $data);    }
    public function insert(Request $request)
    {
        $jenis = new JenisProduk();

        $jenis->jenis = $request->input('jenis');
        $jenis->id_kategori = $request->input('id_kategori');
        if ($request->hasFile('foto_jenis')) {
            $file = $request->file('foto_jenis');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/produk/jenis', $filename);
            $jenis->foto_jenis = $filename;
        } else {
            return $request;
            $jenis->foto_jenis = '';
        }
        $jenis->save();
        return redirect()->route('jenis_produk')->with('jenis', $jenis);
    }
    public function edit($id)
    {
        $jenis = JenisProduk::find($id);
        $kategori = KategoriProduk::all();
        $data = [
            'jenis'=>$jenis,
            'kategori'=>$kategori,
            'notif'=>$this->getStatusAdmin(),
        ];
        return view('admin.products.jenis-edit', $data);
    }

    public function update(Request $request, $id)   
    {
        $jenis = JenisProduk::find($id);
        $kategori = KategoriProduk::all();

        $jenis->jenis = $request->input('jenis');
        $jenis->id_kategori = $request->input('id_kategori');
        if ($request->hasFile('foto_jenis')) {
            $file = $request->file('foto_jenis');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin/produk/jenis', $filename);
            $jenis->foto_jenis = $filename;
        } 
        $jenis->save();
        $data = [
            'jenis'=>$jenis,
            'kategori'=>$kategori,
            'notif'=>$this->getStatusAdmin(),
        ];
        return redirect()->route('jenis_produk')->with('jenis', $jenis);
    }

    public function delete($id)
    {
        DB::table('jenis_produks')->where('id',$id)->delete();
        return redirect()->route('jenis_produk');

    }
    public function getStatusAdmin(){
        $notif = Transaksi::whereIn('id_status',[2,3,6])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        return $notif;
    }
}
