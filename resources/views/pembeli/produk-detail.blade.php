@extends('layouts.portal')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/images/bg-nelayan.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('portal')}}">Home</a></span> <span class="mr-2"><a href="{{route('show_kategori', $produk->id)}}">Product</a></span><span>Product Single</span></p>
          <h1 class="mb-0 bread">Product Single</h1>
        </div>
      </div>
    </div>
</div>
<input type="text" value="{{$produk->id}}" id="idp" style="display: none">

  <section class="ftco-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 mb-5 ftco-animate">
                  <a href="#" class="image-popup"><img src="{{asset('user/toko/'.$produk->id_toko.'/'.'foto_produk/'.$produk->foto_produk)}}" class="img-fluid" alt="Colorlib Template"></a>
              </div>
              <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                  <h3> {{ucwords(strtolower($jenis->jenis))}}</h3>
                  <div class="rating d-flex">
                        @if (isset($rating))
                          <p class="text-left mr-4">
                              <a href="#" class="mr-2">{{number_format((float)$rating, 1, '.', '')}}
</a>
                                @while($rating>0)
                                    @if($rating >=0.5 && $rating < 1)
                                        <i class="fa fa-star-half" style="color: #e8262d"></i>
                                    @elseif($rating >= 1)
                                        <i class="fa fa-star" style="color: #e8262d"></i>
                                    @endif
                                    @php $rating--; @endphp
                                @endwhile

                                
                          </p>
                          @else
                          <p class="text-left mr-4">Belum ada penilaian</p>
                          @endif
                           <p class="text-left">{{$terjual}} <span style="color: #bbb;">Terjual</span>
                          </p> 
                            <p class="text-left ml-3" style="color: #000;">{{$produk->jumlah_stok/1000}} kg
                                <span style="color: #bbb;">Tersedia</span>
                            </p>
                            
                      </div>
                      <br><br>
                  <p class="price d-flex flex-row"><span>Rp {{Number_format($produk->harga)}} / kg</span></p>
                  <h5>Deskripsi Produk</h5>
                  <p>{{$produk->deskripsi}}
                      </p>
                      <div class="row mt-4">
                          <div class="col-md-6">
                              <div class="form-group d-flex">
                    <div class="select-wrap">
                  </div>
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="input-group col-md-6 d-flex mb-3">
                <form action="{{route('transaksi_store', $produk->id)}}" method="post" enctype="multipart/form-data" class="input-group col-lg-12 col-md-6 d-flex mb-3">
                {{ csrf_field() }}
                    <span class="input-group-btn mr-2">
                      <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field="quant[1]"><i class="ion-ios-remove"></i>
                      </button>
                    </span>
                    <input type="number" id="quant[1]" name="quant[1]" class="form-control input-number" value="1" min="1" max="{{$produk->jumlah_stok/1000}}">
                    <span class="input-group-btn ml-2">
                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="quant[1]"><i class="ion-ios-add"></i>
                        </button>
                    </span>
                </div>
                <div class="w-100"></div>
                
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success" style="color: white">Tambah Produk</button>
                </div>
                </form>
              </div>
          </div>
      </div>
  </section>

  <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
      <div class="row d-flex justify-content-center py-5">
        <div>

            <img src="{{asset('user/toko/'.$produk->toko->id.'/'.'foto_toko/'.$produk->toko->foto_toko)}}" class="img-fluid img-thumbnail" alt="mallikan" style="width: 60px; height:60px; border-radius: 50%;">
        </div>
        <div class="col-md-4">
            <h2 style="font-size: 22px;" class="mb-0">{{$produk->toko->name}}</h2>
            <strong class="mr-1">{{$kota->title}}</strong>
        </div>
        <div class="col-md-6 d-flex align-items-center mx-3">
            <div class="form-group d-flex">
            <p><a href="{{route('chat')}}" class="btn btn-black py-3 px-5 mr-1">Chat Penjual</a></p>
            <p><a href="{{route('toko_detail', ['id' => $produk->id_toko])}}" class="btn btn-black py-3 px-5">Kunjungi Toko</a></p>
            
            </div>
        </div>
      </div>
    </div>
</section>
    <section class="ftco-section ftco-degree-bg">
    <div class="container testimonial-group">
        <div class="container">
            <h5>Ulasan Produk</h5>
            @if($komen->count() > 0)
                <div class="ulasan rounded border border-secondary">
                <div class="table_data" id="table_data">
                    @include('pembeli.comment', ['komen' => $produks])

                </div>
            </div>

            
            @else
            Belum ada ulasan
            @endif

        </div>
      </section> <!-- .section -->    

      <section class="ftco-section">
      <div class="container">
              <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Produk</span>
          <h2 class="mb-4">Produk Terkait</h2>
        </div>
      </div>   		
      </div>
      <div class="container">
          <div class="row">
              @foreach ($other_prod as $o)
              <div class="col-md-6 col-lg-3 ftco-animate">
                  <div class="product">
                      <a href="{{route('show_detail', $o->id)}}" class="img-prod"><img class="img-fluid" src="{{asset('user/toko/'.$o->id_toko.'/'.'foto_produk/'.$o->foto_produk)}}" style="width: 100%; height: 150px;" alt="Colorlib Template">
                          <div class="overlay"></div>
                      </a>
                      <div class="text py-3 pb-4 px-3 text-center">
                          <h3><a href="#">{{$o->jenis->jenis}}</a></h3>
                          <div class="d-flex">
                              <div class="pricing">
                                  <p class="price"><span>Rp {{Number_format($o->harga)}}</span></p>
                              </div>
                          </div>
                          <div class="bottom-area d-flex px-3">
                              <div class="m-auto d-flex">
                                  <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                      <span><i class="ion-ios-menu"></i></span>
                                  </a>
                                  <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                      <span><i class="ion-ios-cart"></i></span>
                                  </a>
                                  <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                      <span><i class="ion-ios-heart"></i></span>
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

@push('scripts')
    <script>
    $('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
    });
    $('.input-number').focusin(function(){
    $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {
        
        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());
        
        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        
        
    });
    $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) || 
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>

    <script>
    $.fn.stars = function() {
        return $(this).each(function() {
            // Get the value
            var val = parseFloat($(this).html());
            // Make sure that the value is in 0 - 5 range, multiply to get width
            var size = Math.max(0, (Math.min(5, val))) * 16;
            // Create stars holder
            var $span = $('<span />').width(size);
            // Replace the numerical value with stars
            $(this).html($span);
        });
    }
    $(function() {
        $('span.stars').stars();
    });
    </script>

<script>
$(document).ready(function(){ 

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  var id = $('#idp').val();
  console.log(id);

  fetch_data(page, id);
 });

 function fetch_data(page, id)
 {
  $.ajax({
   url:"/pagination/fetch_data/"+id+"/?page="+page,
   type: "GET",
    dataType: "html",
   success:function(data)
   {
    // $('#table_data').innerHTML(data);
    $('#table_data').html(data);
    //    alert(data);
    // $('#table_data').hide();
   }
  });
 }
 
});
</script>
@endpush