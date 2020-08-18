@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')

<div class="masonry-item" style="padding-left: 200px; padding-top: 20px; padding-right: 20px">
  <div class="bgc-white p-20 bd">
  <div class="card card-2" style="padding-left: 20px">                 
    <h4 class="c-grey-900">Form Alamat</h4>
    <div class="mT-30">
      <form action="{{route('alamat_store')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="penerima">Penerima</label>
        <input type="text" class="form-control" id="penerima" name="penerima">
      </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="provinsi">Provinsi</label>
              <select class="form-control" id="provinsi" name="provinsi">
                <option selected disabled>{{$provinces->title}}</option>
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
  </div>
</div>
</div>
@endsection