<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class KategoriProdukController extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori_produks')->get();

        return view('admin.products.index', ['kategori'=>$kategori]);
    }
    public function insert(Request $request)
    {
        // insert data ke table 
        DB::table('kategori_produks')->insert([
            'kategori' => $request->kategori,
        ]);
        // alihkan halaman ke halaman kategori
        return redirect('/admin/kategori-produk');
    }

    public function edit(Request $request)
    {
        // mengambil data berdasarkan id yang dipilih
        $kategori = DB::table('kategori_produks')->where('id',$request->id)->update([
            'kategori' => $request->kategori,
        ]);
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('admin.products.index',['kategori' => $kategori]);
    }

    // public function update(Request $request)
    // {
    //     // update data
    //     DB::table('kategori_produks')->where('id',$request->id)->update([
    //         'kategori' => $request->kategori,
    //     ]);
    //     // alihkan halaman ke halaman pegawai
    //     return redirect('admin.products.index');
    // }

    public function delete($id)
    {
       $kategori = DB::table('kategori_produks')->where('id',$id)->delete();
        return view('admin.products.index', ['kategori' => $kategori]);
    }
}
