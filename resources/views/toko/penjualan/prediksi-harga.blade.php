@extends('toko.default')

@section('content')
<section>
<div class="container-fluid">
    <div class="form-group clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
                <div class="x_content">
                <h2 style= "color: #107DAC; margin-bottom: 0px"><b>Tabel Harga</b></h2> <br>
                    <table class="table table-striped table-bordered" id="dataTable" >
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Produk</th>
                                <th scope="col">Harga Prediksi Produk</th>
                                <th scope="col">Tanggal Prediksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($hasilPredPenjual as $index => $hpp) 
                            <tr>
                                <td>{{$index+1}}.</td>
                                {{--<td> {{$hpp['id_produk']}} </td>--}}
                                <td> {{$hpp['jenis_produk']}} </td>
                                <td> Rp {{Number_format($hpp['harga_prediksi'])}} </td>
                                <td> {{$hpp['tanggal_prediksi']}} </td>
                            </tr>
                        @endforeach

                        </tbody>
                   </table>
              </div>
        </div>
    </div>
</div>
</section>
@endsection