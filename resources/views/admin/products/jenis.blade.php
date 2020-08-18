@extends('admin.default')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark float-left">Jenis Products</h1>
                <a href="{{route('jenis_produk_add')}}" class="btn btn-info float-right" role="button">+ Jenis Produk</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
                <div class="x_content">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Produk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Foto Produk</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jenis->sortby('id') as $index => $j)
                            <tr>
                                <td>{{$index+1}}.</td>
                                <td scope="row">{{$j->jenis}}</th>
                                <td scope="row">{{$j->kategori_produk}}</th>
                                <td scope="row"><img src="{{asset('admin/produk/jenis/'.$j->foto_jenis)}}" alt="" style="width:200px; height:100px"></th>
                                <td> 
                                    <a href="{{route('jenis_produk_edit',$j->id)}}" class="btn btn-success" role="button">Edit</span></a>
                                    <a href="{{route('jenis_produk_delete',$j->id)}}" class="btn btn-danger" role="button">Hapus</span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
            
                </div>
            </div>
        </div>
        <!-- Modal Create-->
        <div class="modal fade" id="modalproduk" role="dialog">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Jenis Produk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
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
        </div>
        <!-- End Modal Create -->

        {{--<!-- Modal Edit -->
        <div class="modal fade" id="modal_jenis_produk_edit" role="dialog">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Jenis Produk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="/produk/jenis/update/{id}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="id_kategori">Kategori Produk</label>
                            <select class="form-control" id="id_kategori" name="id_kategori">
                                <option>--</option>
                                @foreach($kategori as $k)
                                <option value="{{$k->id}}" @if($jenis->id_kategori == $k->id) selected @endif>{{$kategori->kategori}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" name="jenis" value="{{$jenis->jenis}}">
                        </div>
                        <label for="foto_jenis">Foto Produk</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_jenis" name="foto_jenis" value="{{$jenis->foto_produk}}">
                            <label class="custom-file-label" for="foto_jenis">Choose Image</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        <!-- End Modal Edit -->--}}
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