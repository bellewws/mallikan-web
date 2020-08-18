@extends('admin.default')

@section('content')
<section>
<div class="container-fluid">
    <!-- <div class="row pt-0">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 class="text-dark float-left" style= "padding-bottom:20px">HasilPrediksi Harga Produk</h1>    
        </div>
    </div> -->

    @if(($nilai_y && $jenisProdukPrediksi)!== null)
    <div class="form-group clearfix"></div>
        <div class="card-body" style="min-height: 150px; background-color: white; padding: 20px; width: 1200px">
            <h2 style= "color: #107DAC"><b>Hasil Prediksi Tanggal {{date('d-m-Y', strtotime($tglPrediksi))}}</b></h2>
            <h3>{{$jenisProdukPrediksi->jenis}}</h3>
            <h3>Rp {{Number_format($nilai_y)}}</h3>        

            <div>
            <a href="{{route('prediksi.index')}}" class="btn btn-info float-right" style="background-color: #107DAC;" role="button">Kembali</a>
            </div>
        
        <!-- <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="background-color: #107DAC;">Prediksi Lagi</button>
        </div> -->
    </div>
    @endif
</div>
</section>
@endsection
