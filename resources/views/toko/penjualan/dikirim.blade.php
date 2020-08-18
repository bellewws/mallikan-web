@extends('toko.default')
@section('content')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Dalam Pengiriman</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nama Penerima</th>
                        <th>Jenis Produk</th>
                        <th>Kuantitas</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                      @foreach($konfirmasi as $k)
                        <tbody>
                        <tr>
                            <td>{{$k->user->name}}</td>
                            <td>{{$k->jenis->jenis}}</td>
                            <td>{{$k->jumlah/1000}} kg</td>
                            <td>Rp {{Number_format($k->total_harga)}}</td>
                            <td>
                            @if($k->id_status == 5)
                                <strong>Dalam pengiriman</strong>
                            @else
                                <strong>Diterima</strong>
                            @endif
                            </td>
      
                        </tr>
                        </tbody>
                      @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection