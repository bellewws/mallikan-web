@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 d-flex justify-content-center">
    <div class="col-xl-8 col-md-12">
        <div class="card user-card-full">
            <div class="row m-l-0 m-r-0">
                <div class="col-sm-4 bg-c-lite-green user-profile">
                    <div class="card-block text-center text-white">
                        <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                        <h6 class="f-w-600">{{ Auth::user()->name }}</h6>
                    </div>  
                    @if(isset($alamat))

                    @else                                  
                    <div class="card-block text-center text-white">
                        <h6 class="f-w-600">Jika Anda belum mempunyai alamat</h6>
                        <a href="{{route('alamat_create')}}" class="btn btn-warning btn-sm">Tambah Alamat</a>
                    </div>
                    @endif
                </div>
                <div class="col-sm-8">
                    <div class="card-block">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informasi</h6>
                        <p style="float: right">  <a href="{{route('pembeli_profile_edit', $users->id )}}" class="btn btn-info btn-sm" role="button">Ubah Informasi</a> </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Email</p>
                                <h6 class="text-muted f-w-400">{{$users->email}}</h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Nomor Kontak</p>
                                <h6 class="text-muted f-w-400">{{$users->no_kontak}}</h6>
                            </div>
                        </div>
                        <br>
                        @if(isset($alamat))
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Alamat</h6>
                        <p style="float: right"> <a href="{{route('alamat_edit', $alamat->id)}}" class="btn btn-info btn-sm" role="button">Ubah Alamat</a> </p> 
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="text-muted f-w-400">{{$alamat->alamat}}</h6>
                                <h6 class="text-muted f-w-400">{{$alamat->cities->title}}</h6>
                                <h6 class="text-muted f-w-400">{{$alamat->kecamatan}}</h6>
                                <h6 class="text-muted f-w-400">{{$alamat->kelurahan}}</h6>
                                <h6 class="text-muted f-w-400">{{$alamat->kodepos}}</h6>
                                
                            </div>
                        </div>
                        @else
                        <h6>Alamat Kosong</h6>
                        <hr>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection