@extends('layouts.portal')
@section('content')
<style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<div class="hero-wrap hero-bread" style="background-image: url('/images/bg-nelayan.jpg'); padding-bottom: 50px">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Produk</span></p>
          <h1 class="mb-0 bread">Produk</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex">
    <div class="p-6 sidebar-produk"  style="padding-top: 80 px">
    <div id="produk"></div>
      @include('layouts.sidebar-produk')
    </div>
    <div class="p-6" style="padding-left: 20px; padding-top: 60px">
    <section class="ftco-section">
    <div class="containerr">
    @if(isset($cari))
      <h3>Hasil pencarian produk "{{$cari}}"</h3><br>
    @endif

            <div class="row" id="produks">
            @if($produks->count() > 0)
                @foreach ($produks as $p)
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
                                  <p>{{number_format((float)$p->rating, 1, '.', '')}}
                                  @if(($p->rating)>0)
                                    @for ($i = 0; $i < 5; $i++)
                                        @if (floor($p->rating) - $i >= 1)
                                            {{--Full Start--}}
                                            <i class="fa fa-star" style="color: #e8262d"></i>
                                        @elseif ($p->rating - $i > 0)
                                            {{--Half Start--}}
                                            <i class="fa fa-star-half" style="color: #e8262d"></i>
                                        @endif
                                    @endfor
                                  @endif</span></p>
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
              <h3 style="padding-left: 15px">Produk tidak ditemukan</h3>
            @endif
            </div>
            <div class="row mt-5">
          <div class="col text-center">
          <div class="block-27 d-flex justify-content-center align-center">
          {{ $produks->links() }}
          </div>
          </div>
        </div>
      </section>
                              </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>

</script>
@endpush