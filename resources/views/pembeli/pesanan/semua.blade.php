@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 ftco-cart">

    <div class="container text-center">
    <h3><strong>Semua Pesanan</strong></h3>
        <div class="card-body">
            @foreach ($pesanan as $p)
            <div class="row">
                <div class="col">
                <div class="card card-2">                 
                    <div class="text-white" style="background-color: #007ea8; line-height: 30px; padding-left: 20px">
                        <p style="float: right; padding-right: 20px">Tgl Kirim : {{Carbon\Carbon::parse($p->tgl_kirim)->translatedFormat('d-M-Y')}}</p>
                    </div>
                        <div class="card-body">
                            <div class="media">
                                <div class="sq align-self-center "> 
                                    <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$p->toko->id.'/'.'foto_produk/'.$p->produk->foto_produk)}}" width="135" height="135" />
                                </div>
                                <div class="media-body my-auto text-right">
                                    
                                    <div class="row my-auto flex-column flex-md-row">
                                        <div class="col my-auto text-left">
                                            <h6> {{$p->jenis->jenis}} </h6>
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
                                    <a href="{{route('chat')}}" class="badge badge-info">kirim chat</a>
                                    
                                </div>
                                <div class="col-md-4" style="color: #007ea8">Status : <strong>{{$p->status->status}}</strong>
                                </div>

                                <div class="col-md-2" style="float: right">
                                    <p><a href="{{route('show_order_detail', $p->id)}}" class="btn btn-success btn-sm py-3 px-4" role="button" aria-pressed="true" disabled>Lihat Detail</a></p>    
                                    @if(($p->id_status == 6))
                                        @if (($p->rating)==null)
                                        <p><a href="{{route('rating_index', $p->id)}}" class="btn btn-primary btn-sm py-3 px-4" role="button">Nilai</a></p>
                                        @endif
                                    @elseif(($p->id_status == 5))         
                                        <form action="{{route('pesanan_diterima', $p->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" style="width: 150px">Pesanan Diterima</button>
                                        </form>                           
                                    @endif
                                </div>
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