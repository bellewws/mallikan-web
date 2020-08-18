@extends('toko.default')
@section('content')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Perlu Konfirmasi</h4>
    @if($konfirmasi->count()>0)

    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Penerima</th>
                        <th>Foto Produk</th>
                        <th>Jenis Produk</th>
                        <th>Kuantitas</th>
                        <th>Status Kirim</th>
                        <th>Jam Kirim</th>
                        <th>Total Belanja</th>
                        <th>Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($konfirmasi->sortby('id') as $index => $k)
                        <tr>
                            <td>{{$index+1}}.</td>
                            <td>{{$k->user->name}}</td>
                            <td><img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$k->toko->id.'/'.'foto_produk/'.$k->produk->foto_produk)}}" width="135" height="135" /></td>
                            <td>{{$k->jenis->jenis}}</td>
                            <td>{{$k->jumlah/1000}} kg</td>
                            @if ($k->kirim_sekarang == true)
                            <td>Kirim Sekarang</td>
                            @else
                            <td>{{Carbon\Carbon::parse($k->tgl_kirim)->translatedFormat('l, d-M-Y')}}</td>
                            @endif
                            <td>{{$k->jam_kirim}}</td>
                            <td>Rp {{Number_format($k->total_harga)}}</td>
                            <td>
                                <a href="{{route('penjualan_proses', $k->id)}}" role="button" class="btn btn-primary">Proses</a>
                                <a href="{{route('show_penjualan_detail', $k->id)}}" role="button" class="btn btn-primary">Detail</a>
                                <a href="{{route('chat')}}" role="button" class="btn btn-info">Kirim Chat</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <div class="text-center">
                        <img src="/assets/logo-biru.png" alt="" width=200 height=90>
                        <br><br>
                        <h4 style="color: black">Tidak ada pesanan perlu diproses</h4>
                    </div>
                    @endif
                        

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

@endsection