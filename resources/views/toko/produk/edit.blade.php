@extends('toko.default')

@section('content')
<div class="masonry-item">
  <div class="bgc-white p-20 bd">
    <h6 class="c-grey-900">Form Edit Produk</h6>
    <div class="mT-30">
      <form action="{{route('produk_update', encrypt($produk->id))}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <input type="hidden" name="id" id="id" value="{{$produk->id}}">
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="id_kategori">Kategori Produk</label>
              <select class="form-control" id="id_kategori" name="id_kategori">
                <option selected disabled>Pilih Kategori</option>
                  @foreach ($kategori as $k)
                  <option value="{{$k->id}}" @if($produk->id_kategori == $k->id) selected @endif>{{$k->kategori}}</option>
                  @endforeach
              </select>
            </div>
         <div class="form-group col-md-6">
            <label for="id_jenis">Jenis Produk</label>
            <select class="form-control" id="id_jenis" name="id_jenis">
              <option selected disabled>Pilih Jenis</option>
              @foreach ($jenis as $j)
              <option value="{{$j->id}}" @if($produk->id_jenis == $j->id) selected @endif>{{$j->jenis}}</option>
              @endforeach
            </select>
         </div>
    </div>
      <div class="form-group">
        <label for="inputAddress">Foto Produk (Pilih Salah Satu)</label>
        @if($produk->foto_produk)
            <img class="profile-pic" name="foto_produk" src="{{asset('user/toko/'.$toko->id.'/foto_produk/'.$produk->foto_produk)}}" width=400 height=300/>
        @else
            <img class="profile-pic" src="/assets/logo-biru.png" width=300 height=300 />
        @endif
        <br>
        <button id="foto_sendiri" type="reset" class="btn btn-warning" style="margin-left: 10px; margin-bottom: 10px">Punya Foto Produk</button>
        <div class="custom-file" id="custom-file" style="display: none; padding: 10px">
          <input type="file" class="custom-file-input foto_jenis" name="foto_produk" accept="image/*">
          <label class="custom-file-label" for="foto_jenis">Choose Image</label>
        </div>

        <button id="foto_admin" type="reset" class="btn btn-warning" style="margin-left: 10px; margin-bottom: 10px">Gunakan Foto dari Admin</button>
        <div class="radio_img" style="display:none" id="radio_img">
          @foreach ($jenis as $j)
            <label class="radio-inline" >
            <input type="radio" class="radio_jenis" name="radio_jenis" value="{{$j->foto_jenis}}">
            <img src="{{url('/admin/produk/jenis/'.$j->foto_jenis)}}" alt="" style="width:200px; height:100px">
            <p for="" style="text-align:center">{{$j->jenis}}</p></input>
            </label>
          @endforeach
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Harga Produk (per kg)</label>
        <input type="number" class="form-control" id="inputAddress" name="harga" value="{{$produk->harga}}">
      </div>
      <div class="form-group">
        <label for="inputAddress2">Deskripsi Produk</label>
        <input type="text" class="form-control" id="inputAddress2" name="deskripsi" value="{{$produk->deskripsi}}">
      </div>
      <div class="form-group">
        <label for="inputAddress2">Jumlah Produk (kg)</label>
        <input type="number" class="form-control" id="inputAddress2" name="jumlah_stok" value="{{$produk->jumlah_stok}}">
      </div>
      <button type="submit" class="btn btn-primary">Edit Produk</button>
      </form>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  $('#foto_sendiri').on('click',function(){
    $("#foto_sendiri").hide();
    $("#custom-file").show();
    $("#foto_admin").hide();
  });
  $('#foto_admin').on('click',function(){
    $("#foto_admin").hide();
    $("#foto_sendiri").hide();
    $("#radio_img").show();
    $("#profile-pic").hide();
  });      
</script>

<script>
  $(document).ready(function() {    
    var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('.profile-pic').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);
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
