@extends('admin.default')
@section('content')
<section class="col-lg-8 justify-content-center">
  <div class="masonry-item">
    <div class="bgc-white p-20 bd">
      <h4 class="c-grey-900">Edit Barcode</h4>
      <div class="mT-30">
      <form action="{{route('update_barcode', $barcode->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
            <div class="form-group">
                <label for="inputNoHP">No Handphone</label>
                <input type="number" class="form-control" id="nomor" name="nomor" value="{{$barcode->nomor}}">
            </div>
            <div class="form-group">
                <label for="inputFoto">Upload Barcode</label>
                <img class="profile-pic" id="profile-pic" src="{{asset('admin/barcode/'.$barcode->foto)}}" width=300 height=300 />
            </div>            
          <br>
          <div class="custom-file" id="custom-file" style="padding: 10px">
            <input type="file" class="custom-file-input foto_jenis" name="foto" accept="image/*">
            <label class="custom-file-label" for="foto_jenis">Choose Image</label>
          </div>
            </div>
            <br>
        <button type="submit" class="btn btn-primary">Edit Barcode</button>
        </form>
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