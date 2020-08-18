@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2">
  <div class="container">
  <div class="card card-2">                 

      <table class="table table-striped">
        <thead>
          <tr class="" style="color:black">
            <th scope="col">Jenis Produk</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Kuantitas (kg)</th>
            <th scope="col">Total Harga</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody style="color:black">
        @foreach ($cart as $c)
          <tr>
            <td>{{$c->jenis->jenis}}</td>
            <td>Rp {{Number_format($c->produk->harga)}}</td>
            <td>{{$c->jumlah/1000}}</td>
            <td>Rp {{Number_format($c->total_harga)}}</td>
            <td><a href="{{route('cart_delete',$c->id)}}" class="btn btn-primary-outline" role="button" style="color: red">Hapus</span></a></td>
            @if($alamat != null)
                <td><a href="{{route('checkout_index',$c->id)}}" class="btn btn-primary" id="" role="button">Checkout</span></a></td>
            @else
                <td><a data-toggle="modal" data-target="#myModal" class="btn btn-danger" style="display: inline-block; vertical-align: top; color: white">Tambah Alamat</a></td>
            @endif
          </tr>
          @endforeach
        </tbody>
        <div class="modal" id="myModal">
          <form action="{{route('alamat_insert')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
          <div class="modal-dialog">
              <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Alamat Pengiriman</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: black">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputAddress">Penerima</label>
                  <input type="text" class="form-control" id="penerima" name="penerima">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="provinsi">Provinsi</label>
                    <select class="form-control" id="provinsi" name="provinsi">
                      <option selected disabled>{{$provinces}}</option>
                    </select>
                </div>
                  <div class="form-group col-md-6">
                      <label for="kota">Kota</label>
                      <select class="form-control" id="kota" name="kota">
                        <option selected disabled>Pilih Kota</option>
                        @foreach ($cities as $c)
                        <option value="{{$c->city_id}}">{{$c->title}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                </div>
                <div class="form-group">
                  <label for="inputAddress">Kelurahan</label>
                  <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Alamat Lengkap</label>
                  <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Kode Pos</label>
                  <input type="number" class="form-control" id="inputAddress2" name="kodepos">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Alamat</button>
            </form>
          </div>

      </table>
    </div>  
  </div>
</section>



@endsection
