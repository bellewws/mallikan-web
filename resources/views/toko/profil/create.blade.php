@extends('layouts.portal')

@section('content')
    <div class="card" style="width: 50%; margin: 50px auto; align: center">
        <div class="card-body">
            <div class="text-ceer">
                <img src="/assets/logo-biru.png" alt="" width=100 height=45>
                <br>
                <br>
                <p style="display: inline">Halo, </p>
                <p style="display: inline;"><strong>{{$user->name}}</strong></p>
                <p>Tolong isi identitas lengkap tokomu, di bawah ini ya!</p>
            </div>
            <br>
            <form action="{{route('toko_profile_store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="username_toko">Username Toko</label>
                    <input type="text" class="form-control" id="username_toko" name="username_toko">
                </div>
                <div class="form-group">
                    <label for="name">Nama Toko</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="id_kota">Lokasi</label>
                    <select class="form-control" id="id_kota" name="id_kota">
                    <option selected disabled>Pilih Kota</option>
                    @foreach ($kota as $k)
                        <option value="{{$k->id}}">{{$k->title}}</option>
                    @endforeach
                    </select> 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection