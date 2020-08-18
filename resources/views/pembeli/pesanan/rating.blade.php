@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex justify-content-center">
                <div class="nilai border border-secondary rounded text-center" style="padding: 10px">
                    <h5>Pesanan Anda</h5>
                    <br>
                    <div class="row">
                                            <div class="col-6 text-left">
                                                <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$p->toko->id.'/'.'foto_produk/'.$p->produk->foto_produk)}}" style="width: 150px; height: 100px" />
                                                <br>
                                                <br>
                                                <h7>Jumlah : {{$p->jumlah/1000}} kg</h7><br>
                                            <h7>Total : Rp {{Number_format($p->total_harga)}}</h7><br>
                                            <h7>Diterima : {{Carbon\Carbon::parse($p->updated_at)->translatedFormat('d-M-Y')}}</h7>
                                            </div>
                                        <div class="col-6 text-left">
                                                <strong class="text-danger">{{$p->toko->name}}</strong>
                                                <p>{{$p->produk->jenis->jenis}}</p>
                                            <br>
                                            
                                        </div>
                                        

                </div>
            </div>
        </div>


    </div>
    <div class="col-md-6" style="padding: 10px; margin-top: 20px">
    <div class="text-center">
    <h5>Nilai Pesanan</h5>
    </div>
    <form action="{{route('rating', $p->id)}}" id="form_rating" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

    <div class="d-flex justify-content-center" style="margin-top: 20px" >
                                            <ul class="rate-area">
                                                <input type="radio" id="5-star" name="rating" value="5" >
                                                <label for="5-star" title="Sangat bagus" class="bintang">Sangat bagus</label>
                                                <input type="radio" id="4-star" name="rating" value="4">
                                                <label for="4-star" title="bagus" class="bintang">Bagus</label>
                                                <input type="radio" id="3-star" name="rating" value="3">
                                                <label for="3-star" title="normal" class="bintang">Normal</label>
                                                <input type="radio" id="2-star" name="rating" value="2">
                                                <label for="2-star" title="buruk" class="bintang">Buruk</label>
                                                <input type="radio" id="1-star" required="" name="rating" value="1" aria-required="true" class="bintang">
                                                <label for="1-star" title="sangat buruk" name="rating">Sangat buruk</label>
                                            </ul>
                                        </div>
                                        <input type="text" placeholder="Saran / komentar Anda" name="komentar">
                                        <br><br>
                                        <input type="text" value="{{$p->id_toko}}" style="display: none" name="id_toko">
                                        <strong style="color: black">Upload Foto Produk</strong>
                                        <br>
                                        <div class="custom-file" id="custom-file" style=" padding: 10px; max-width: 300px">
                                            <input type="file" class="custom-file-input foto_jenis" name="foto_rating" accept="image/*">
                                            <label class="custom-file-label" for="foto_jenis">Pilih Foto</label>
                                        </div>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-success" style="width: 80px">Kirim</button>
                                        <br>
                                        <br>
                                        <img class="profile-pic" id="profile-pic" src="/assets/empty.jpg" style="width: 200px; height: 200px; display: none" />
                                        </form>
        </div>

</div>

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