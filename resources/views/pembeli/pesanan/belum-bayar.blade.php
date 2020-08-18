@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 ftco-cart">

    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card card-2">
                    <div class="text-white" style="background-color: #007ea8; line-height: 30px"> <p class="pl-5" style="margin-top: 15px">Pesanan Belum Dibayar</p> </div>
                    @foreach ($pesanan as $p)
                        <div class="card-body">
                            <div class="text-black" >
                                {{--  <span><p>Sisa waktu pembayaran :</p>
                                <strong id="demo"></strong></span>  --}}

                            </div>
                            <div class="media">
                               
                                <div class="sq align-self-center "> 
                                    <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="/admin/produk/bandeng.png" width="135" height="135" />
                                </div>
                                <div class="media-body my-auto text-right">
                                    
                                    <div class="row my-auto flex-column flex-md-row">
                                        <div class="col my-auto">
                                            <h6 class="mb-0"> {{$p->jenis->jenis}}  </h6>
                                        </div>
                                        <div class="col my-auto"> <small>Harga : Rp 30000</small></div>
                                        <div class="col my-auto"> <small>Jumlah : {{$p->jumlah/1000}} kg</small></div>
                                        <div class="col my-auto">
                                            <h6 class="mb-0"><small>Total : </small>Rp {{Number_format($p->total_harga)}}</h6>
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
                                
                                <div class="col-md-2 mb-3"> <small> Tgl Pesan : </small><br> {{Carbon\Carbon::parse($p->updated_at)->translatedFormat('d-M-Y')}} </div>
                                <div class="col-md-2 mb-3 " style="color: #007ea8"><small> Status : </small> <strong>{{$p->status->status}}</strong></div>
                                <div class="col-md-3">
                                    <p><a href="{{route('bayar', $p->id)}}" class="btn btn-primary btn-sm py-2 px-3" role="button" aria-pressed="true" style="float: right">Bayar Sekarang</a></p>
                                </div>

                                <input type="text" value="{{$p->updated_at}}" id="waktu" style="display: none">
                                <div class="col-md-1">
                                    <p><a href="{{route('show_order_detail', $p->id)}}" class="btn btn-primary btn-sm py-2 px-3" role="button" aria-pressed="true" >Lihat</a></p>
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