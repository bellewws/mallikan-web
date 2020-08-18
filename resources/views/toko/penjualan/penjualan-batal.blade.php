@extends('toko.default')
@section('content')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Pesanan Dibatalkan</h4>
    @if($transaksi->count()>0)
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Penerima</th>
                            <th>Foto Produk</th>
                            <th>Jenis Produk</th>
                            <th>Kuantitas</th>
                            <th>Total Belanja</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Penerima</th>
                            <th>Foto Produk</th>
                            <th>Jenis Produk</th>
                            <th>Kuantitas</th>
                            <th>Total Belanja</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                        </tfoot>
                        
                        <tbody>
                        @foreach($transaksi->sortby('id') as $index => $t)
                        <tr>
                            <td>{{$index+1}}.</td>
                            <td>{{$t->user->name}}</td>
                            <td><img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$t->toko->id.'/'.'foto_produk/'.$t->produk->foto_produk)}}" width="135" height="135" /></td>
                            <td>{{$t->jenis->jenis}}</td>
                            <td>{{$t->jumlah/1000}} kg</td>
                            <td>Rp {{Number_format($t->total_harga)}}</td>
                            <td>{{$t->status->status}}</td>
                            <td> <a href="{{route('show_penjualan_detail',$t->id)}}" class="btn btn-primary btn-sm" role="button">Lihat</a>
                                <button type="submit" class="btn btn-primary">Tanggapi Permintaan</button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                    <div class="text-center">
                        <img src="/assets/logo-biru.png" alt="" width=200 height=90>
                        <br><br>
                        <h4 style="color: black">Tidak ada pesanan dibatalkan</h4>
                    </div>
                    @endif
                        </tbody>
                
                </table>
            </div>
        </div>
    </div>
</div>

@endsection