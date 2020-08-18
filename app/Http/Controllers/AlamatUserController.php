<?php

namespace App\Http\Controllers;
use Auth;
use App\Province;
use App\City;
use App\AlamatUser;
use App\User;
use App\Transaksi;
use DB;


use Illuminate\Http\Request;

class AlamatUserController extends Controller
{
    public function getStatusUser(){

        $user = User::where('id', Auth::user()->id)->first();

        $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[3,4,5,7])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    
    }

    public function index()
    {
        $user = Auth::user()->id;
        $alamat = AlamatUser::where('id_user', $user)->with('provinces')->with('cities')->first();
        $data = [
            'user'=>$user,
            'alamat'=>$alamat,
            'notif'=>$this->getStatusUser(),
        ];
        if($alamat != null){
            return view('pembeli.alamat.index', $data);
        } 
        
        return view('pembeli.alamat.new', $data);
    }

    public function create()
    {
        $users = Auth::user();
        $alamat = AlamatUser::where('id_user', $users->id)->with('provinces')->with('cities')->first();
        $provinces = Province::where('id', 6)->first();
        $cities = City::where('province_id', 6)->get();

        $data = [
            'provinces'=>$provinces,
            'cities'=>$cities,
            'users'=>$users,
            'alamat'=>$alamat,
            'notif'=>$this->getStatusUser(),
        ];

        return view('pembeli.alamat.create', $data);


    }

    public function store(Request $request)
    {
        $alamat = new AlamatUser();
        $user = Auth::user()->id;

        $alamat->id_user = $user;
        $alamat->id_provinces = 6;
        $alamat->penerima = $request->input('penerima');
        $alamat->id_cities = $request->input('kota');
        $alamat->kecamatan = $request->input('kecamatan');
        $alamat->kelurahan = $request->input('kelurahan');
        $alamat->alamat = $request->input('alamat');
        $alamat->kodepos = $request->input('kodepos');

        $alamat->save();
        return redirect()->route('show_profile');

    }

    public function insert(Request $request)
    {
        $alamat = new AlamatUser();
        $user = Auth::user()->id;

        $alamat->id_user = $user;
        $alamat->id_provinces = 6;
        $alamat->penerima = $request->input('penerima');
        $alamat->id_cities = $request->input('kota');
        $alamat->kecamatan = $request->input('kecamatan');
        $alamat->kelurahan = $request->input('kelurahan');
        $alamat->alamat = $request->input('alamat');
        $alamat->kodepos = $request->input('kodepos');

        $alamat->save();
        return back();
    }

    public function edit($id)
    {
        $alamat = AlamatUser::find($id);

        $user = Auth::user()->id;
        $provinces = Province::where('id', 6)->first();
        $cities = City::where('province_id', 6)->get();

        $data = [
            'provinces'=>$provinces,
            'cities'=>$cities,
            'user'=>$user,
            'alamat'=>$alamat,
            'notif'=>$this->getStatusUser(),
        ];

        return view('pembeli.alamat.edit', $data);

    }

    public function update(Request $request, $id)
    {
        $alamat = AlamatUser::find($id);

        $user = Auth::user()->id;
        $provinces = Province::where('id', 6)->first();
        $cities = City::where('province_id', 6)->get();

        $alamat->id_user = $user;
        $alamat->id_provinces = 6;
        $alamat->penerima = $request->input('penerima');
        $alamat->id_cities = $request->input('kota');
        $alamat->kecamatan = $request->input('kecamatan');
        $alamat->kelurahan = $request->input('kelurahan');
        $alamat->alamat = $request->input('alamat');
        $alamat->kodepos = $request->input('kodepos');
        $alamat->save();        

        $data = [
            'provinces'=>$provinces,
            'cities'=>$cities,
            'user'=>$user,
            'alamat'=>$alamat,
            'notif'=>$this->getStatusUser(),

        ];
        // return back();

        return redirect()->route('show_profile')->with('alamat', $alamat);
    }

    public function ubah(Request $request, $id)
    {
        $alamat = AlamatUser::find($id);

        $user = Auth::user()->id;
        $provinces = Province::where('id', 6)->first();
        $cities = City::where('province_id', 6)->get();

        $alamat->id_user = $user;
        $alamat->id_provinces = 6;
        $alamat->penerima = $request->input('penerima');
        $alamat->id_cities = $request->input('kota');
        $alamat->kecamatan = $request->input('kecamatan');
        $alamat->kelurahan = $request->input('kelurahan');
        $alamat->alamat = $request->input('alamat');
        $alamat->kodepos = $request->input('kodepos');
        $alamat->save();        

        $data = [
            'provinces'=>$provinces,
            'cities'=>$cities,
            'user'=>$user,
            'alamat'=>$alamat,
            'notif'=>$this->getStatusUser(),

        ];
        return back();
    }

}
