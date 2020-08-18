<?php

namespace App\Http\Controllers;
use App\Transaksi;
use App\Toko;
use App\User;
use Auth;
use App\StatusPembelian;
use DB;

use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
    }

    public function getStatus(){
        $toko = Toko::where('id_user', Auth::user()->id)->first();

        $notif = Transaksi::where('id_toko',$toko->id, 'and')->whereIn('id_status',[3,6,8])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    }

    public function notiftoko(){
        $notif = $this->getStatus();
        // dd($notif);
        return view ('toko.partials.notifikasi',compact('notif'));
    }

    public function getStatusUser(){

        $user = User::where('id', Auth::user()->id)->first();

        $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[3,4,5,7])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    
    }

    public function notifuser(){
        $notif = $this->getStatusUser();
        // dd($notif);
        return view ('pembeli.notif_user',compact('notif'));
    }


    public function getStatusAdmin(){
        $notif = Transaksi::whereIn('id_status',[2,3,6])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        return $notif;

        // $user = User::where('id', Auth::user()->id)->first();
    
        // $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[2,3,6])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
