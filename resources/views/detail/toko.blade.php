@extends('layouts.portal')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/images/bg-nelayan.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Toko</span></p>
          <h1 class="mb-0 bread">Toko</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><img src="{{asset('user/toko/'.$toko->id.'/'.'foto_toko/'.$toko->foto_toko)}}" style="width: 100px; height: 60px"/>
              </p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
                <span>
                  <p><span class="icon icon-user"> </span>Username : {{$toko->username_toko}}</p>
                  <p><span class="icon icon-store_mall_directory"> </span>Nama Toko : {{$toko->name}}</p>
                  <p><span class="icon icon-map-marker"> </span>Lokasi : {{$toko->kota->title}}</p>
                </span>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span class="icon icon-product-hunt"> </span>Produk : {{$produk->count()}}</p>
              {{--<p><span class="icon icon-star-half-full"> </span>Penilaian : {{$toko->rata_rating}}</p>--}}
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <a href="{{route('chat')}}" class="btn btn-primary py-3 px-5"> <span class="icon icon-chat"></span> Kirim Chat</a>
            </div>
        </div>
        
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 mb-5 text-center">
          <ul class="product-category">
            <li><a href="#" class="active">All</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
      @if($produk->count() > 0)
                @foreach ($produk as $p)
              <div class="col-md-3 ftco-animate">
                  <div class="product">
                      <a href="{{route('show_detail', $p->id)}}" class="img-prod"><img class="img-fluid" src="{{asset('user/toko/'.$p->id_toko.'/'.'foto_produk/'.$p->foto_produk)}}" alt="mallikan foto" style="width: 100%; height: 150px;">
                          <div class="overlay"></div>
                      </a>
                      <div class="text py-3 pb-4 px-3 text-center">
                          <h3><a href="{{route('show_detail', $p->id)}}">{{$p->jenis->jenis}}</a></h3>
                          <div class="d-flex">
                              <div class="pricing">
                                  <p class="price"><span class="price-sale">Rp {{number_format($p->harga)}}</span></p>
                              </div>
                          </div>
                          <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                              <a href="{{route('show_detail', $p->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                <span><i class="ion-ios-eye"></i></span>
                              </a>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
            @else
              <h4 style="padding-left: 50px">Produk tidak ada</h4>
            @endif
        
      </div>
    </div>
  </section>
@endsection