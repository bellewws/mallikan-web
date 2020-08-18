@extends('admin.default')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-dark float-left">Menunggu Konfirmasi</h1>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
                <div class="x_content">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pesanan</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($konfirmasi->sortby('id') as $index => $k)
                            <tr>
                                <td>{{$index+1}}.</td>
                                <td>
                                <div class="card card-2">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="sq align-self-center "> 
                                                <h6>Pembeli : {{$k->user->name}}</h6>
                                            </div>
                                            <div class="media-body my-auto text-right">
                                                
                                                <div class="row my-auto flex-column flex-md-row">
                                                    <div class="col my-auto">
                                                        <h6>Produk : {{$k->jenis->jenis}} </h6>
                                                    </div>
                                                    <div class="col my-auto"> 
                                                        <h6>Jumlah : {{$k->jumlah/1000}} kg</h6>
                                                    </div>
                                                    <div class="col my-auto"> 
                                                        <h6>Sub Total : Rp {{Number_format($k->subtotal)}}</h6>
                                                        <h6>Biaya Kirim : Rp {{Number_format($k->biaya_ongkir)}}</h6>
                                                    </div>
                                                    <div class="col my-auto">
                                                        <h6 class="mb-0"><h6>Total : </h6>Rp {{Number_format($k->total_harga)}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-3 ">
                                        <div class="row">
                                            <div class="col-md-2 mb-3"> 
                                                <img src="{{asset('user/toko/'.$k->toko->id.'/'.'foto_toko/'.$k->toko->foto_toko)}}" class="img-fluid img-thumbnail" alt="mallikan" style="width: 60px; height:60px; border-radius: 50%;">
                                                <h6> {{$k->toko->name}} </h6>
                                            </div>
                                            <div class="col-md-2 mb-3"> <h6> Kode : </h6> {{$k->kode}}</div>

                                            <div class="col-md-2 mb-3"> <h6> Tanggal : </h6> {{$k->updated_at->format('d-m-Y')}}</div>
                                            <div class="col-md-2 mb-3"> <h6> Jam Kirim : </h6> {{$k->jam_kirim}}</div>
     
                                            <div class="col-md-1 mx-4">
                                                <h6><a href="{{route('transaksi_batal', $k->id)}}" class="btn btn-danger btn-sm py-3 px-4" role="button" aria-pressed="true" >Tolak</a></h6>
                                            </div>
                                            <div class="col-md-2">
                                                <h6><a href="{{route('transaksi_berhasil', $k->id)}}" class="btn btn-primary btn-sm py-3 px-4" role="button" aria-pressed="true" >Terima</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection