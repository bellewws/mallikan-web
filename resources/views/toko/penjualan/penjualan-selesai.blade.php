@extends('toko.default')
@section('content')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Penjualan Selesai</h4>
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
                            <th>Rating</th>
                            <th>Ulasan</th>
                            <th>Detail Pesanan</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($transaksi->sortby('id') as $index => $k)
                    <tr>
                        <td>{{$index+1}}.</td>
                        <td>{{$k->user->name}}</td>
                        <td><img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/toko/'.$k->toko->id.'/'.'foto_produk/'.$k->produk->foto_produk)}}" width="135" height="135" /></td>
                        <td>{{$k->jenis->jenis}}</td>
                        <td>{{$k->jumlah}} kg</td>
                        <td>Rp {{Number_format($k->total_harga)}}</td>
                        <td style="color: #e8262d">
                        @if(isset($k->rating))
                            <h4>@for ($a=1; $a<=$k->rating; $a++)
                            <span>★</span>
                            @endfor</h4>
                            @if($k->rating == 5)
                            <p>Sangat bagus</p>
                            @elseif($k->rating == 4)
                            <p>Bagus</p>
                            @elseif($k->rating == 3)
                            <p>Normal</p>
                            @elseif($k->rating == 2)
                            <p>Buruk</p>
                            @elseif($k->rating == 1)
                            <p>Sangat buruk</p>
                            @endif
                        @else
                            <p>Tidak ada penilaian</p>
                        @endif
                        </td>
                        <td>
                        @if(sizeof($k->comments)>0)
                            <a href="#" role="button" class="btn btn-primary" aria-pressed="true"data-toggle="modal" data-target="#myModal{{$k->id}}">Ulasan</a>
                        @else
                            <p>Tidak ada ulasan</p>
                        @endif
                        </td>
                        <td>
                            <a href="{{route('show_penjualan_detail', $k->id)}}" role="button" class="btn btn-primary">Lihat</a>
                        </td>
                    </tr>

                    <div class="modal" id="myModal{{$k->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Penilaian Pesanan</h4>
                                <button type="button" class="close" data-dismiss="modal" style="color: black">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                            @include('pembeli._comment_replies', ['comments' => $k->comments]) 


                            </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection