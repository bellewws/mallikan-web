@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')

<div class="masonry-item" style="padding-left: 200px; padding-top: 20px; padding-bottom: 30px; padding-right: 20px">
  <div class="bgc-white p-20 bd">
    <h4 class="c-grey-900">Alamat</h4>
    <a href="{{route('alamat_edit', $alamat->id)}}" class="btn btn-info float-right" role="button">+ Ubah Alamat</a>
    <div class="container" >
    <table class="table table-borderless" style="text-align: left;">
        <tbody>
            <tr>
                <td>Penerima</td>
                <td>{{$alamat->Penerima}}</td>
            </tr>   
            <tr>
                <td>Kota</td>
                <td>{{$alamat->cities->title}}</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>{{$alamat->kecamatan}}</td>
            </tr>
            <tr>
                <td>Kelurahan</td>
                <td>{{$alamat->kelurahan}}</td>
            </tr>
            <tr>
                <td>Alamat Lengkap</td>
                <td>{{$alamat->alamat}}</td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td>{{$alamat->kodepos}}</td>
            </tr>
        </tbody>
    </table>
    </div>


  </div>
</div>
@endsection