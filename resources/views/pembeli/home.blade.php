@extends('layouts.portal')
@section('content')
    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/slider1.png)">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">Marketplace ikan laut</h1>
	              <h3 class="mb-4" style="color:white">Langsung dari Pasar Ikan Muara Angke</h3>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/slider2.jpg); opacity: 0.5">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
					<h1 class="mb-2">Marketplace ikan laut</h1>
					<h3 class="mb-4" style="color:white">Menjual Harga Termurah</h3>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
	<div class="container">
		<div class="row no-gutters ftco-services">
          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
				<img src="/images/package.png" alt="" width=100 height=100>
              <div class="media-body" style="padding: 10px">
                <h3 class="heading">Pengiriman</h3>
                <span>JNE, TIKI, POS</span>
              </div>
            </div>      
          </div>
          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
				<img src="/images/002-fish.png" alt="" width=100 height=100>
              <div class="media-body" style="padding: 10px">
                <h3 class="heading">Selalu Segar</h3>
                <span>Produk Terbungkus dalam Keadaan Baik</span>
              </div>
            </div>    
          </div>
          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
				<img src="/images/003-payment.png" alt="" width=100 height=100>
              <div class="media-body" style="padding: 10px">
                <h3 class="heading">Pembayaran</h3>
                <span>OVO</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
	
		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-self-stretch" style="background-color: #fff;">
									<div class="text-center" style="background-color: #fff; margin: 0 auto; padding-top: 80px;">
										<img src="/images/mallikan1.png" alt="" width=140 height=70>
										<p>Menjual ikan segar siap antar!</p>
										<p> <strong style="color: #007ea8">Beli Sekarang!</strong> </p>
									</div>
								</div>
								<a href="{{route('show_kategori','kepiting')}}">
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/kategoriii.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0" style="color:white">Kepiting</h2>
									</div>
								</div>
								</a>
							</div>
							
							<div class="col-md-6">
								<a href="{{route('show_kategori','ikan')}}">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/kategorii.png);">
									<div class="text px-3 py-1">
										<h2 class="mb-0" style="color:white">Ikan</h2>
									</div>
								</div>
								</a>
								<a href="{{route('show_kategori','cumi')}}">
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/kategori5.png);">
									<div class="text px-3 py-1">
										<h2 class="mb-0" style="color:white">Cumi-Cumi</h2>
									</div>
								</div>
								</a>
							</div>

							
						</div>
					</div>

					<div class="col-md-4"><a href="{{route('show_kategori','kerang')}}">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/kategori2.png);">
							<div class="text px-3 py-1">
								<h2 class="mb-0" style="color:white">Kerang</h2>
							</div>		
						</div></a>
						<a href="{{route('show_kategori','udang')}}">
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/kategori4.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0" style="color:white">Udang</h2>
							</div>
						</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		@if($produk!=="none")	
		<br>
		<br>
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h3 class="mb-4"><strong>Rekomendasi Produk</strong></h3>
				</div>
			</div>   		
    	</div>
    	<div class="container">
    		<div class="row justify-content-center">
			
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
            @endif

    		</div>
    	</div>
    </section>

	<section class="ftco-section">
    	<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h3 class="mb-4"><strong>Produk Terlaris</strong></h3>
				</div>
			</div>   		
    	</div>
    	<div class="container">
    		<div class="row justify-content-center">	
                @foreach ($terlaris as $p)
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
								  <p>{{$p->terjual}} Terjual</p>
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
    		</div>
    	</div>
    </section>

@endsection