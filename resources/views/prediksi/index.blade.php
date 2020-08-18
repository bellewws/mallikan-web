@extends('admin.default')
@section('css')
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/propellerkit@1.3.1/dist/css/propeller.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/propellerkit-datetimepicker@1.2.0/css/pmd-datetimepicker.css">
@endsection
@section('content')

<section>
  <div class="container-fluid">
     <div class="row pt-0">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 class="text-dark float-left" style= "padding-bottom:30px">Prediksi Harga Produk</h1>    
        </div>
    </div>

        <div class="card-body" style="min-height: 100px; background-color: white; padding: 20px">
        <h2 style= "color: #107DAC"><b>Prediksi Harga</b></h2> <br>
                <form action="{{route('prediksi')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}                   
                    <div class="form-group">
                        <label for="id_kategori">Kategori Produk</label>
                            <select class="form-control" id="id_produk" name="id_produk">
                                <option value="">Pilih Jenis Ikan</option>
                                @foreach($jenisProduk as $jp)
                                <option value="{{$jp->id}}"> {{$jp->jenis}} </option>
                                @endforeach
                            </select>
                    </div>
                <!--Date picker -->
                    <div class="form-group">
                        <div class="pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label" for="datepicker">Pilih tanggal prediksi</label>
                            <input type="text" name="tanggal_prediksi" class="form-control" id="datepicker">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="background-color: #107DAC;">Prediksi</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="form-group clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
            <div class="x_content">
            <h2 style= "bold; color: #107DAC; margin-bottom:0px; "><b>Tabel Regresi</b></h2> <br>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Produk</th>
                    <th scope="col">Tanggal Awal</th>
                    <th scope="col">a</th>
                    <th scope="col">b</th>
                    <th scope="col">Suku Awal</th>
                    <th scope="col">Beda</th>
                </tr>
                </thead>
                <tbody>
                @foreach($linregs as $linreg)
                <tr>
                    <td> {{$linreg->id}} </td>
                    <td>
                        @if(isset($linreg->jenisproduk))
                        {{$linreg->jenisproduk->jenis}}
                        @endif
                    </td>
                    <td> {{$linreg->tanggal_awal}} </td>
                    <td> {{$linreg->a}} </td>
                    <td> {{$linreg->b}} </td>
                    <td> {{$linreg->suku_awal}} </td>
                    <td> {{$linreg->beda}} </td> 
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>

        <div class="form-group clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
            <div class="x_content">
            <h2 style= "color: #107DAC; margin-bottom: 0px"><b>Tabel Harga</b></h2> <br>
            <table class="table">
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
                    <td> {{$HistoriHarga->harga_produk}} </td>
                    <td> {{$HistoriHarga->tanggal_harga}} </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<!-- jquery JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Popper JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- -- Bootstrap js  -->
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- -- Propeller textfield js   -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/propellerkit@1.3.1/dist/js/propeller.min.js"></script>

<!-- -- Datepicker moment with locales  -->
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment-with-locales.min.js"></script>

<!-- -- Propeller Bootstrap datetimepicker -- -->
<script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/propellerkit-datetimepicker@1.2.0/js/bootstrap-datetimepicker.js"></script> 

<script>
	// Date picker only
	$('#datepicker').datetimepicker({
		format: 'YYYY-MM-DD'
        //format:'DD-MM-YYYY'
	});
</script>
@endsection
