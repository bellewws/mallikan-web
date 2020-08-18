<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\City;
use App\Toko;
use App\Transaksi;
use Auth;


class ProfilTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user()->id;
        $toko = Toko::where('id_user', $user)->first();
        $kota = City::where('city_id', $toko->id_kota)->first();
        // dd($toko);
        // $toko = DB::table('tokos')->select('tokos.id as id','tokos.username_toko', 'tokos.name as name', 'tokos.id_kota', 'kotas.nama_kota', 'tokos.foto_toko')->join('users', 'users.id', '=', 'tokos.id_user')->join('kotas','kotas.id','=','tokos.id_kota')->first();
        $data = [
            'user'=>$user,
            'toko'=>$toko,
            'notif'=>$this->getStatus(),
            'kota'=>$kota
        ];

        // dd($data);
        return view('toko.profil.index', $data);
    }

    public function getStatus(){
        $toko = Toko::where('id_user', Auth::user()->id)->first();

        $notif = Transaksi::where('id_toko',$toko->id, 'and')->whereIn('id_status',[3,6,8])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;

    //     if(isset($toko)){

    //        $notif = Transaksi::where('id_toko',$toko->id, 'and')->whereIn('id_status',[3,6,8])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
    //        // dd($notif);
    //        return $notif;
    //    }
    //     else{

    //         return null;
    //     }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        $kota = City::where('province_id', 6)->get();

        $data = [
            'user'=>$user,
            'kota'=>$kota,
            'notif'=>$this->getStatusUser(),

        ];
        return view('toko.profil.create', $data);
        
    }

    public function store(Request $request)
    {
        // // untuk validasi form
        // $this -> validate($request, [
        //     'username_toko' => 'required',
        //     'name' => 'required',
        //     'id_kota' => 'required',
        // ]);
        $user = Auth::user()->id;
        $insert = DB::table('tokos') -> insert([
            'username_toko' => $request->input('username_toko'),
            'name' => $request->input('name'),
            'id_kota' => $request->input('id_kota'),
            'id_user' => $user,
            'rata_rating' => 0,
            'jml_transaksi_berhasil' => 0,
            'jml_transaksi_batal' => 0,
        ]);
        $user_update = DB::table('users')->where('id',$user)->update([
            'boolean_penjual' => 1
        ]);
        return redirect()->route('toko_profil_index');

    }

    public function edit($id)
    {
        $id = decrypt($id);
        $toko = Toko::find($id);
        $kota = City::where('province_id', 6)->get();
        $data = [
            'toko'=>$toko,
            'kota'=>$kota,
            'notif'=>$this->getStatus(),
        ];
        return view('toko.profil.edit', $data);
    }

    public function update(Request $request, $id)   
    {
        $id = decrypt($id);   
        $toko = Toko::find($id);
        $kota = City::where('province_id', 6)->get();

        $toko->username_toko = $request->input('username_toko');
        $toko->name = $request->input('name');
        $toko->id_kota = $request->input('id_kota');

        if ($request->hasFile('foto_toko')) {
            $file = $request->file('foto_toko');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('user/toko/'.$toko->id.'/'.'foto_toko/',$filename);
            $toko->foto_toko = $filename;
        }
        $toko->save();
        $data = [
            'toko'=>$toko,
            'kota'=>$kota,
            'notif'=>$this->getStatus(),
        ];
        return redirect()->route('toko_profil_index')->with('toko', $toko);
    }
    public function getStatusUser(){

        $user = User::where('id', Auth::user()->id)->first();

        $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[3,4,5,7])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    
    }
}
