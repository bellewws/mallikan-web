@extends('admin.default')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark float-left">Products</h1>
                <a href="#" class="btn btn-info float-right" role="button" data-toggle="modal" data-target="#modalproduk">+ Jenis Produk</a>
            </div>
        </div>
        <div class="clearfix"></div>
       
        <div class="card-body">
            <form action="{{route('jenis_produk_insert')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="id_kategori">Kategori Produk</label>
                    <select class="form-control" id="id_kategori" name="id_kategori">
                    <option selected disabled>Pilih Kategori</option>
                    @foreach ($kategori as $k)
                        <option value="{{$k->id}}">{{$k->kategori}}</option>
                    @endforeach
                    </select> 
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <input type="text" class="form-control" name="jenis">
                </div>
                <label for="foto_jenis">Foto Produk</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto_jenis" name="foto_jenis">
                    <label class="custom-file-label" for="foto_jenis">Choose Image</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endpush