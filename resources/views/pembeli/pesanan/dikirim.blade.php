@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 ftco-cart">

    <div class="container">
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <div class="card card-2">
                    <div class="text-white" style="background-color: #007ea8; line-height: 50px; padding-left: 20px">Pesanan Dikirim</div>

                        <div class="card-body">
                        @foreach ($pesanan as $p)
                            <div class="media">
                                <div class="sq align-self-center "> 
                                    <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$p->toko->id.'/'.'foto_produk/'.$p->produk->foto_produk)}}" width="135" height="135" />
                                </div>
                                <div class="media-body my-auto text-left">
                                    <div class="row my-auto flex-column flex-md-row">
                                        <div class="col my-auto">
                                            <h6> {{$p->jenis->jenis}} </h6>
                                        </div>
                                        <div class="col my-auto"> <h6>Jumlah : {{$p->jumlah/1000}} kg</h6></div>
                                        <div class="col my-auto"> <h6>Resi : {{$p->resi_kurir}}</h6></div>
                                        <div class="col my-auto">
                                            <h6 class="mb-0">Total : Rp {{Number_format($p->total_harga)}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3 ">
                            <div class="row">
                                <div class="col-md-3 mb-3"> 
                                    <img src="{{asset('user/toko/'.$p->toko->id.'/'.'foto_toko/'.$p->toko->foto_toko)}}" class="img-fluid img-thumbnail" alt="mallikan" style="width: 40px; height:40px; border-radius: 50%;">
                                    <small> {{$p->toko->name}} </small>
                                    <a href="{{route('toko_detail', $p->toko->id)}}" class="badge badge-info">kunjungi toko</a>
                                </div>
                                
                                <div class="col-md-3 mb-3"> Tgl Kirim : {{$p->tgl_kirim}} </div>
                                <div class="col-md-3 mb-3 " style="color: #007ea8">Status : {{$p->status->status}}</div>
                                <div class="col-md-3 mt-auto">
                                    <form action="{{route('pesanan_diterima', $p->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="width: 200px">Pesanan Diterima</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection