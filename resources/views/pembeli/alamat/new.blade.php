@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')

    <div class="card" style="width: 50%; margin: 50px auto; align: center">
        <div class="card-body">
            <div class="text-center">
                <img src="/assets/logo-biru.png" alt="" width=200 height=90>
                <br>
                <br>
                <p>Kamu belum punya alamat</p>
                <a href="{{route('alamat_create')}}" class="btn btn-primary">Tambah Alamat</a>
            </div>
            <br>
        </div>
    </div>
@endsection