@extends('toko.default')

@section('content')
<div class="masonry-item">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
            <h4 class="c-grey-900">Daftar Produk</h4>
            <a href="{{route('produk_create')}}" class="btn btn-info float-right" role="button">+ Tambah Produk</a>
                <div class="x_content" style="padding-top: 50px">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Produk</th>
                            <th scope="col">Foto Produk</th>
                            <th scope="col">Jumlah (kg)</th>
                            <th scope="col">Harga (per kg)</th>
                            <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($produks as $index => $t)
                            <tr>
                                <td>{{$index+1}}.</td>
                                <td scope="row">{{ucwords(strtolower($t->jenis->jenis))}}</th>
                                <td scope="row"><img src="{{asset('user/toko/'.$t->toko->id.'/'.'foto_produk/'.$t->foto_produk)}}" alt="" style="width:200px; height:100px"></th>
                                <td scope="row">{{$t->jumlah_stok}}</th>
                                <td scope="row">Rp {{Number_format($t->harga)}}</th>
                                <td> 
                                    <a href="{{route('produk_edit',encrypt($t->id))}}" class="btn btn-success" role="button">Edit</span></a>
                                    <a href="{{route('produk_delete',$t->id)}}" class="btn btn-danger" role="button">Hapus</span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
            
                </div>
            </div>
        </div>

</div>

@endsection