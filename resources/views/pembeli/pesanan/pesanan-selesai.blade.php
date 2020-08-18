@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 ftco-cart">
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col">
                <div class="card card-2">  
                @if(isset($pesanan))
                @foreach ($pesanan as $p)        
                    <div class="text-white justify-content-center" style="background-color: #007ea8; line-height: 50px; padding-left: 20px">
                        <span>Selesai</span>
                        <span style="float: right; padding-right: 20px">Tgl Kirim : {{Carbon\Carbon::parse($p->tgl_kirim)->translatedFormat('d-M-Y')}}</span>
                    </div>
                        <div class="card-body">
                            <div class="media">
                                <div class="sq align-self-center "> 
                                    <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$p->toko->id.'/'.'foto_produk/'.$p->produk->foto_produk)}}" width="135" height="135" />
                                </div>
                                <div class="media-body my-auto text-right">
                                    
                                    <div class="row my-auto flex-column flex-md-row">
                                        <div class="col my-auto text-left">
                                            <h6> {{ucwords(strtolower($p->jenis->jenis))}} </h6>
                                            @if(isset($p->rating))
                                                @for ($a=1; $a<=$p->rating; $a++)
                                                    <strong style="color: #e8262d">★</strong>
                                                @endfor
                                            @endif
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
                                <div class="col-md-6"> 
                                    <img src="{{asset('user/toko/'.$p->toko->id.'/'.'foto_toko/'.$p->toko->foto_toko)}}" class="img-fluid img-thumbnail" alt="mallikan" style="width: 40px; height:40px; border-radius: 50%;">
                                    <small> {{$p->toko->name}} </small>
                                    <a href="{{route('toko_detail', $p->toko->id)}}" class="badge badge-info">kunjungi toko</a>
                                    
                                </div>
                                <div class="col-md-4" style="color: #007ea8">Status : <strong>{{$p->status->status}}</strong></div>
                                <div class="col-md-2" style="float: right">
                                @if (isset($p->rating))
                                    <p><a href="{{route('show_order_detail', $p->id)}}" class="btn btn-success btn-sm py-3 px-4" role="button" aria-pressed="true" disabled>Lihat Detail</a></p>    
                                @else
                                    <p><a href="{{route('rating_index', $p->id)}}" class="btn btn-primary btn-sm py-3 px-4" role="button">Nilai Pesanan</a></p>

                                    {{--<p><a href="#" class="btn btn-primary btn-sm py-3 px-4" role="button" aria-pressed="true"data-toggle="modal" data-target="#myModal{{$p->id}}">
                                        Nilai</a></p>--}}
                                @endif

                                </div>
                            </div>

                            <div class="modal" id="myModal{{$p->id}}">
                                <form action="{{route('rating', $p->id)}}" id="form_rating" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Penilaian Pesanan</h4>
                                      <button type="button" class="close" data-dismiss="modal" style="color: black">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$p->toko->id.'/'.'foto_produk/'.$p->produk->foto_produk)}}" width="135" height="135" />
                                            </div>
                                        <div class="col-8">
                                            <span>
                                                <strong>{{$p->toko->name}}</strong> - {{$p->produk->jenis->jenis}}
                                            </span>
                                            <br>
                                            <h7>Jumlah : {{$p->jumlah}} kg</h7><br>
                                            <h7>Total : Rp {{Number_format($p->total_harga)}}</h7><br>
                                            <h7>{{Carbon\Carbon::parse($p->created_at)->translatedFormat('d-M-Y')}}</h7>
                                        </div>
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-center">
                                            <ul class="rate-area">
                                                <input type="radio" id="5-star" name="rating" value="5" >
                                                <label for="5-star" title="Amazing" class="bintang">5 stars</label>
                                                <input type="radio" id="4-star" name="rating" value="4">
                                                <label for="4-star" title="Good" class="bintang">4 stars</label>
                                                <input type="radio" id="3-star" name="rating" value="3">
                                                <label for="3-star" title="Average" class="bintang">3 stars</label>
                                                <input type="radio" id="2-star" name="rating" value="2">
                                                <label for="2-star" title="Not Good" class="bintang">2 stars</label>
                                                <input type="radio" id="1-star" required="" name="rating" value="1" aria-required="true" class="bintang">
                                                <label for="1-star" title="Bad" name="rating">1 star</label>
                                            </ul>
                                        </div>
                                        <input type="text" placeholder="Saran / komentar Anda" name="komentar">
                                        <br><br>
                                        <input type="text" value="{{$p->id_toko}}" style="display: none" name="id_toko">
                                        <strong style="color: black">Upload Foto Produk</strong>
                                        <br>
                                        <div class="custom-file" id="custom-file" style=" padding: 10px">
                                            <input type="file" class="custom-file-input foto_jenis" name="foto_rating" accept="image/*">
                                            <label class="custom-file-label" for="foto_jenis">Pilih Foto</label>
                                        </div>
                                        <br>
                                        <br>
                                        <img class="profile-pic" id="profile-pic" src="/assets/empty.jpg" style="width: 100px; height: 100px; display: none" />

                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" data-dismiss="modal" style="width: 80px">Tidak</button>
                                        <button type="submit" class="btn btn-warning" style="width: 80px">Kirim</button>
                                    </div>

                                    </div>
                                </div>
                                </form>
                            </div>
                            
                        </div>
                    @endforeach
                    @else
                    <h2>Tidak ada pesanan</h2>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {    
    var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('.profile-pic').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);
        $(".profile-pic").show();
      }
    }
    $(".foto_jenis").on('change', function(){
      readURL(this);
    });
    $(".upload-button").on('click', function() {
      $(".foto_jenis").click();
    });
  });
</script>
@endpush