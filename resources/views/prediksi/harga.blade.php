@extends('admin.default')

@section('content')
<section>
<div class="container-fluid">
    <div class="row pt-0">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 class="text-dark float-left" style='padding-left: 10px'>Tabel Histori Harga Produk</h1>    
        </div>
    </div>

    <div class="form-group clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
                <div class="x_content">
                <h2 style= "color: #107DAC; margin-bottom: 0px"><b>Tabel Harga Tahun 2019</b></h2> <br>
                    <table class="table table-striped table-bordered" id="dataTable" >
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Produk</th>
                                <th scope="col">Harga Produk</th>
                                <th scope="col">Tanggal Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($historiHargas as $HistoriHarga)
                            <tr>
                                <td> {{$HistoriHarga->id}} </td>
                                <td> {{$HistoriHarga->jenisproduk->jenis}} </td>
                                <td> Rp {{Number_format($HistoriHarga->harga_produk)}} </td>
                                <td> {{$HistoriHarga->tanggal_harga}} </td>
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

@push('scripts')
<script>
$(document).ready(function () {
    $("#jenis_produk").change(function () {
        var clicked = $('#jenis_produk').val();

        var APP_URL = window.location.href;
        var url = new URL(window.location.href);

        url.searchParams.set('jenis', clicked);
        window.location.href = url; 

    });
});

</script>
@endpush