@extends('layouts.portal')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="#">Home</a></span> <span>Checkout</span></p>
          <h1 class="mb-0 bread">Checkout</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
          <form action="{{route('submit_checkout', $cart->id)}}" class="billing-form" method="post" enctype="multipart/form-data">
          @csrf

              <div class="w-100"></div>
                  <div class="col-md-12 d-flex mb-5">
                    <div class="cart-detail cart-total p-3 p-md-4">
                      <h3 class="billing-heading mb-4">Alamat Pengiriman</h3>

                        <a class="btn btn-success" style="margin-bottom: 20px; color: white" data-resis="{{$alamat->id}}" data-toggle="modal" data-target="#myModal{{$alamat->id}}">Ubah Alamat</a>
                        <p class="d-flex">
                            <span>Penerima : {{$alamat->penerima}}</span>
                            <span>{{$alamat->alamat}}</span>
                            
                        </p>
                        <hr>
                        <p class="d-flex">
                          <span>Kec : {{$alamat->kecamatan}}</span>
                          <span>Kel : {{$alamat->kelurahan}}</span>
                        </p>
                        <hr>
                        <p class="d-flex">
                          <span>{{$alamat->cities->title}}</span>
                            <span>{{$alamat->kodepos}}</span>
                            <input type="number" name="id_tujuan" id="id_tujuan" value="{{$alamat->id_cities}}" style="display:none">
                        </p>

                      </div>

                  </div>

                  <div class="col-md-12 d-flex mb-5">
                    <div class="cart-detail cart-total p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Rincian Pesanan</h3>
                          <p class="d-flex">
                            <span><strong style="color:#085bc2">{{$cart->toko->name}}</strong></span>
                            <input type="number" name="id_asal" id="id_asal" value="{{$cart->toko->id_kota}}" style="display:none">

                          </p>
                          <div class="row">
                            <div class="col-md-6">
                              <img src="{{asset('user/toko/'.$cart->toko->id.'/'.'foto_produk/'.$cart->produk->foto_produk)}}" width=200 height=100 alt="">
                            </div>
                            <div class="col-md-6">
                              <h3>{{$cart->jenis->jenis}}</h3>
                              <input type="number" name="berat" id="berat" value="{{$cart->jumlah}}" style="display:none">
                              <h3>{{$cart->jumlah/1000}} kg</h3>
                              <h3><strong>Rp {{Number_format($cart->subtotal)}}</strong></h3>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12" style="display:none">
                      <div class="form-group">
                          <label for="country">Provinsi Asal</label>
                          <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="province_origin" id="province_origin" class="form-control">
                            <option selected disabled>Pilih Provinsi</option>
                            @foreach ($provinces as $province => $value)
                            <option value="{{$province}}" selected>{{$value}}</option>
                            @endforeach
                        </select>
                      </div>

                      </div>
                  </div>
                  <div class="col-md-12" style="display:none">
                      <div class="form-group">
                          <label for="country">Kota Asal</label>
                          <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="city_origin" id="city_origin" class="form-control">
                            <option selected>Pilih Kota</option>
                            @foreach ($toko_cities as $city => $value)
                            <option value="{{$city}}" selected>{{$value}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                  </div>
                  
                  <!-- TUJUAN -->
                  <div class="col-md-12" style="display:none">
                      <div class="form-group">
                          <label for="country">Provinsi Tujuan</label>
                          <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="province_destination" id="province_destination" class="form-control">
                            <option selected disabled>Pilih Provinsi</option>
                            @foreach ($provinces as $province => $value)
                            <option value="{{$province}}" selected>{{$value}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                  </div>
                  <div class="col-md-12" style="display:none">
                      <div class="form-group">
                          <label for="country">Kota Tujuan</label>
                          <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="city_destination" id="city_destination" class="form-control">
                            @foreach ($cities as $city => $value)
                            <option value="{{$city}}" selected>{{$value}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                  </div>

                  <!-- BERAT -->
                  <div class="col-md-12" style="display:none">
                      <div class="form-group">
                          <label for="country">Berat</label>
                          <div class="select-wrap">
                          <input type="number" name="weight" class="form-control" id="weight" value="{{$cart->jumlah}}">
  
                      </div>
                      </div>
                  </div>
                
                  <div class="w-100"></div>
                  <div class="col-md-6">
                  {{--<div class="form-group">
                      <label for="phone">Nomor Handphone</label>
                    <input type="text" class="form-control" name="no_kontak" placeholder="Ex: 082227738902" value="{{$user->no_kontak}}">
                  </div>--}}
                  </div>
                  
                
                  </div>
                  <div class="col-xl-5">
                  {{--<div class="w-100"></div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="dateorder">Tanggal Pengiriman</label>
                      <div class="radio">
                        <label class="mr-3" id="kirim_sekarang"><input type="radio" name="kirim_sekarang"> Kirim Sekarang </label>
                        <label id="kirim_nanti"><input type="radio" name="kirim_nanti"> Kirim Nanti</label>
                      </div>
                      <input type="date" class="form-control" id="picker" name="date_kirim_nanti" style="display:none">
                  </div>
              </div>
              </div>--}}
            <div class="row mt-5 pt3">
                <div class="col-md-6 d-flex mb-5" style="width: 600px">
                    <div class="cart-detail cart-total p-3 p-md-4" style="width: 600px">
                    <h3 for="dateorder">Pengiriman</h3>
                    <h6 style="color: red">*Pembayaran di atas jam 17.00 akan dianggap pesanan hari berikutnya dan akan dikirim h+1
                    </h6>
                      <div class="radio">
                        <label class="mr-3" id="kirim_sekarang"><input type="radio" name="kirim_sekarang"> Sekarang</label>
                        <label id="kirim_nanti"><input type="radio" name="kirim_nanti"> Nanti</label>
                      </div>
                      <br>
                      <h3 for="dateorder">Waktu Pengiriman</h3>
                      <input type="date" class="form-control" id="picker" name="date_kirim_nanti" style="display:none">
                      <div class="form-group">
                          <select class="form-control form-control-sm" id="jam_kirim" name="jam_kirim" style="height: 10px">
                              <option disabled selected>Pilih Jam</option>
                              <option value="09.00 - 11.00 WIB">09.00 - 11.00 WIB</option>
                              <option value="16.00 - 18.00 WIB">16.00 - 18.00 WIB</option>
                          </select>        
                      </div>
                      </div>
                </div>
                <div class="col-md-6 d-flex mb-5" style="width: 600px">
                    <div class="cart-detail cart-total p-3 p-md-4" style="width: 600px">
                      <div class="row">
                        <div class="col-md-6">
                          <h3>Sub Total</h3>
                          <h3>Biaya Kirim</h3>
                          <h3><strong>Total Biaya</strong></h3>
                        </div>
                        <div class="col-md-6">
                          <input type="text" name="biaya_ongkir" id="biaya_ongkir" value="18000" hidden>
                          <input type="text" name="total_harga" id="total_harga" value="{{$cart->subtotal+18000}}" hidden>
                          <h3 class="shipping-charges">Rp {{Number_format($cart->subtotal)}}</h3>
                          <h3 class="shipping-charges">Rp 18,000</h3>
                          <h3 class="shipping-charges"><strong>Rp {{Number_format($cart->subtotal+18000)}}</strong></h3>
                        </div>
                      </div>
                      
                    </div>
                </div>
            </div>
                <div class="col-md-12 d-flex mb-5" style="width: 600px">
                    <div class="cart-detail cart-total p-3 p-md-4" style="width: 600px">
                    {{--<div class="form-group">
                      <h6 style="color: red">*Harap memilih kurir dengan durasi pengiriman yang cepat</h6>
                          <h3 for="country">Kurir</h3>
                          <div class="select-wrap">
                        <select name="courier" id="courier" class="form-control dynamic"  data-dependent="layanan">
                            <option selected disabled>Pilih Kurir</option>
                            @foreach ($couriers as $courier => $value)
                            <option value="{{$courier}}">{{$value}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group mt-2" id="courier_service_state" style="display: none;">
                        <h3 for="courier_service">Layanan</h3>
                        <div class="select-wrap">
                          <select name="courier_service" id="courier_service" class="form-control">
                            <option selected disabled>Pilih Layanan</option>
                          </select>
                        </div>
                      </div>

                      <div class="shipping-charges" style="display: none;">
                        <!--- fee will appear at h3 tag-->
                        <h3></h3>
                        <h2></h2>
                        <input type="hidden" id="ongkir" name="ongkir">
                        
                      </div>
                      </div>--}}
                      </div>
                </div>
                <button type="submit" class="btn btn-primary py-3 px-4 center" style="width:300px">Pesan</button>

                                  </form><!-- END -->
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
    <div class="modal" id="myModal{{$alamat->id}}">
      <form action="{{route('alamat_ubah', $alamat->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Ubah Alamat</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <div class="modal-body">
            <div class="form-group">
                  <label for="penerima">Penerima</label>
                  <input type="text" class="form-control" id="penerima" name="penerima" value="{{$alamat->penerima}}">
                </div>  
                <div class="form-group">
                      <label for="kota">Kota</label>
                      <select class="form-control" id="kota" name="kota">
                        <option selected disabled>Pilih Kota</option>
                        @foreach ($citiess as $c)
                        <option value="{{$c->city_id}}" @if($alamat->id_cities == $c->city_id) selected @endif >{{$c->title}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{$alamat->kecamatan}}">
                </div>
                <div class="form-group">
                  <label for="inputAddress">Kelurahan</label>
                  <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{$alamat->kelurahan}}">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Alamat Lengkap</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="{{$alamat->alamat}}">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Kode Pos</label>
                  <input type="number" class="form-control" id="inputAddress2" name="kodepos" value="{{$alamat->kodepos}}">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Ubah Alamat</button>
            </div>

          </div>
        </div>
        </form>

    </div>
  </section> <!-- .section -->

@endsection

@push('scripts')
<script type="text/javascript">
  $('#kirim_sekarang').on('click',function(){
    $("#kirim_nanti").hide();
    $("#picker").hide();
  });
  $('#kirim_nanti').on('click',function(){
    $("#kirim_sekarang").hide();
    $("#picker").show();
  });
  
  $('select[name="courier"]').on('change', function(e) {
    e.preventDefault();

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var tujuan = $('#id_tujuan').val();
    var asal = $('#id_asal').val();
    var berat = $('#berat').val();
    var APP_URL = {!! json_encode(url('/')) !!}

    console.log(tujuan);


    // isi data ini sesuai kebutuhan, bisa diambil dari tag html dom nya, ini gua bikin contohnya aja
    data = {
      _token: CSRF_TOKEN,
      origin: asal,
      destination: tujuan,
      weight: berat,
      courier: this.value
    }
    
    // state urlnya tinggal di ganti aja ya, ini gua bikin versi global url
    $.ajax({
      url: APP_URL+'/user/second-service',
      type: "POST",
      data: data,
      dataType: "html",
      success:function(data) {
        $('#courier_service_state').show();
        $('select[name="courier_service"] option').remove();
       setTimeout(function() {
         $('select[name="courier_service"]').append(data);
       }, 500)
       
      }
    });
  })

  $('select[name="courier_service"]').on('change', function(e) {
    e.preventDefault();
    
    $('.shipping-charges').show();
    
    $('.shipping-charges h3').text('Biaya Kirim: ' + this.value);

    var x = Number(this.value) + Number({{$cart->total_harga}});

    $('.shipping-charges h2').text('Biaya Total: ' + x);

    $("input[id='ongkir']").val(this.value);
    
  })
</script>

{{--<script type="text/javascript">
  {{--$(document).ready(function(){
    $('select[name="province_origin').on('change', function(){
      let provinceId = $(this).val();
      if (provinceId) {
        jQuery.ajax({
          url: '/user/province/'+provinceId+'/cities',
          type: "GET",
          dataType: "json",
          success:function(data) {
            $('select[name="city_origin"]').empty();
            $.each(data, function(key, value) {
              $('select[name="city_origin"]').append('<option value="'+key+'">'+value+'</option>');

            });
          },
        });
      } else{
        $('select[name="city_origin"]').empty();
      }
    });

    $('select[name="province_destination').on('change', function(){
      let provinceId = $(this).val();
      if (provinceId) {
        jQuery.ajax({
          url: '/user/province/'+provinceId+'/cities',
          type: "GET",
          dataType: "json",
          success:function(data) {
            $('select[name="city_destination"]').empty();
            $.each(data, function(key, value) {
              $('select[name="city_destination"]').append('<option value="'+key+'">'+value+'</option>');

            });
          },
        });
      } else{
        $('select[name="city_destination"]').empty();
      }
    });

  })--}}

</script>

<!-- <script>
  $('select[name="kurir').on('change', function(){
      let asal = $('#city_origin').val();
      let tujuan = $('#city_destination').val();
      let berat = $('#weight').val();
      let kurir = $('#kurir').val();
      let output = '';

      

  })

</script> -->
@endpush