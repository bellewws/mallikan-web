@extends('admin.default')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-dark float-left">Produk Toko</h1>
                
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
                <div class="x_content">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Kategori Produk</th>
                            <th scope="col">Jenis Produk</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Stok Produk</th>
                            <th scope="col">Foto Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks->sortby('id') as $index => $p)
                            <tr>
                                <td>{{$index+1}}.</td>
                                <td scope="row">{{$p->nama_toko}}</td>
                                <td scope="row">{{$p->kategori}}</td>
                                <td scope="row">{{$p->jenis}}</td>
                                <td scope="row">Rp {{number_format($p->harga)}}</td>
                                <td scope="row">{{$p->jumlah_stok}}</td>
                                <td scope="row"><img src="{{asset('user/toko/'.$p->id_toko.'/'.'foto_produk/'.$p->foto)}}" alt="" style="width:200px; height:100px"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $produks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
    {{--  @section('script.js')
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
    @endsection  --}}
@endsection