@extends('admin.default')

@section('content')
<section>
<div class="container-fluid">
    <div class="row pt-0">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 class="text-dark float-left" style= "padding-bottom:50px">Prediksi Harga Produk</h1>    
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
                        <input type="text" name="tanggal_prediksi" class="form-control"  data-provide="datepicker">
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
                    <table class="table" id="dataTable">
                    <!-- //LAANJAY | tambain itu doang wkwk PADAHAL UDAHHH WKWKWK COBA ATUNYA DAH | yg mana? HARGA--> 
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
    </div>

    <!-- kayanya 1 page cuma bisa 1 berarti bikin dropdown khusu itu aja ya? nanti diarahin ke page baru? iyaa jadi jatohnya kek data user ama data toko -->

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
                   {{$historiHargas->links()}}
              </div>
        </div>
    </div>


</div>
</section>
@endsection