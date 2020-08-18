@extends('toko.default')
@section('content')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Pesanan Perlu Dikirim</h4>

    <div class="row">
   
        <div class="col-md-12">
        @if($konfirmasi->count()>0)
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nama Penerima</th>
                        <th>Foto Produk</th>
                        <th>Jenis Produk</th>
                        <th>Kuantitas</th>
                        <th>Jam Kirim</th>
                        <th>Tindakan</th>
                    </tr>
                    </thead>
                      @foreach($konfirmasi as $k)
                        <tbody>
                        <tr>
                            <td>{{$k->user->name}}</td>
                            <td><img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$k->toko->id.'/'.'foto_produk/'.$k->produk->foto_produk)}}" width="135" height="135" /></td>
                            <td>{{$k->jenis->jenis}}</td>
                            <td>{{$k->jumlah/1000}} kg</td>
                            <td>{{$k->jam_kirim}}</td>
                            <td>
                            @if(isset($k->resi_kurir))
                              <button class="btn btn-info" disabled data-resis="{{$k->resi_kurir}}" data-toggle="modal" data-target="#myModal{{$k->id}}">Sudah Dikirim</button>
                            @else
                              <button class="btn btn-primary" data-resis="{{$k->resi_kurir}}" data-toggle="modal" data-target="#myModal{{$k->id}}">Kirim</button>
                            @endif
                            </td>
                            <div class="modal" id="myModal{{$k->id}}">
                              <form action="{{route('insert_resi', $k->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                <div class="modal-dialog">
                                  <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Konfirmasi 
                                        Kirim Produk
                                      </h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <h4 style="color: black">Apakah Anda yakin sudah mengirim produk?</h4>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Iya</button>
                                      <button type="submit" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                    </div>

                                  </div>
                                </div>
                                </form>

                              </div>
                        </tr>
                        @endforeach
                        @else
                        <div class="text-center">
                            <img src="/assets/logo-biru.png" alt="" width=200 height=90>
                            <br><br>
                            <h4 style="color: black">Tidak ada pesanan perlu dikirim</h4>
                        </div>
                        @endif

                        </tbody>
                      
                </table>
            </div>


        </div>
    </div>
</div>



@endsection

