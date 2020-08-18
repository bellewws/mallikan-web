@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 ftco-cart">

    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col">
                <div class="card card-2">                 
                    <div class="text-white" style="background-color: #007ea8; line-height: 50px; padding-left: 20px">Pesanan Dibatalkan
                        
                    @foreach ($pesanan as $p)
                    <p style="float: right; padding-right: 20px">Tgl Kirim : {{$p->tgl_kirim}}</p>
                    </div>
                        <div class="card-body">
                            <div class="media">
                                <div class="sq align-self-center "> 
                                    <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="/admin/produk/bandeng.png" width="135" height="135" />
                                </div>
                                <div class="media-body my-auto text-right">
                                    
                                    <div class="row my-auto flex-column flex-md-row">
                                        <div class="col my-auto">
                                            <h6> {{$p->jenis->jenis}} </h6>
                                        </div>
                                        <div class="col my-auto"> <h6>Jumlah : {{$p->jumlah/1000}} kg</h6></div>
                                        <div class="col my-auto">
                                            <h6 class="mb-0">Total : Rp {{Number_format($p->total_harga)}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3 ">
                            <div class="row">
                                <div class="col-md-6 mb-6"> 
                                    <img src="{{asset('user/toko/'.$p->toko->id.'/'.'foto_toko/'.$p->toko->foto_toko)}}" class="img-fluid img-thumbnail" alt="mallikan" style="width: 40px; height:40px; border-radius: 50%;">
                                    <small> {{$p->toko->name}} </small>
                                    <a href="{{route('toko_detail', $p->toko->id)}}" class="badge badge-info">kunjungi toko</a>
                                    <a href="{{route('chat')}}" class="badge badge-info">kirim chat</a>
                                    
                                </div>
                                
                                <div class="col-md-6 mb-6 " style="color: #007ea8">Status : <strong>{{$p->status->status}}</strong></div>
                              
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