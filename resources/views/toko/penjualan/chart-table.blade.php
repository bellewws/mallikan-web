@extends('toko.default')
@section('content')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Detail Grafik Produk Terjual</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        {{--  <th>Foto Produk</th>  --}}
                        <th>Jenis Produk</th>
                        <th>Total Terjual</th>
                        <th>Total Harga Produk</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($konfirmasi->sortby('id') as $index => $k)
                        <tr>
                            <td>{{$index+1}}.</td>
                            <td>{{$k->bulan}}</td>
                            <td>{{$k->tahun}}</td>
                            {{--  <td><img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$k->toko->id.'/'.'foto_produk/'.$k->produk->foto_produk)}}" width="135" height="135" /></td>  --}}
                            <td>{{$k->jenis}}</td>
                            <td>{{$k->jmlh}} kg</td>
                            <td>Rp {{Number_format ($k->sum)}}</td>
                           
                        </tr>
                        @endforeach
                   
                        

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

@endsection