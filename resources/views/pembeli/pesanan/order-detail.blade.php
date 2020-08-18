@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 ftco-cart">
    <div class="container-fluid">
        <div class="billing-details ml-5">
            <div class="billing-details-content">
                <div class="bil-title">Rincian Pesanan</div>

                 <table>
                     <th>
                        <tr>
                        <td style="font-weight: 600"> PRODUK</td>
                        
                        <td class="right-t">TOTAL</td>
                        </tr>
                     </th>
                     <hr>
 
                     <tr>
                        <td>{{$k->produk->jenis->jenis}}</td>
                         
                        <td class="right-t">{{$k->jumlah/1000}} kg</td>
                     </tr>
                     <tr>
                         <td>Subtotal: </td>
                         <td class="right-t">Rp {{Number_format($k->subtotal)}}</td>
                     </tr>
                     <tr>
                         <td>Pengiriman : <span>{{$k->kurir}}</span></td>
                         <td class="right-t">{{Number_format($k->biaya_ongkir)}}</td>
                     </tr>
                     
                     <tr class="br-top">
                         <td>Total</td>
                         <td class="right-t">{{$k->total_harga}}</td>
                     </tr>
      
                 </table>
                 <hr>
                 <div class="bil-title">Alamat Penagihan</div>
                 <table>
                    <tr>
                        <td>{{$k->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Alamat : <span>
                            {{$k->alamat->alamat}}</span></td>
                    </tr>
                    <tr>
                        <td>Kota: <span>{{$k->alamat->cities->title}}</span></td>
                    </tr>
                    <tr>
                        <td>Kelurahan: <span>{{$k->alamat->kelurahan}}</span></td>
                    </tr>
                    <tr>
                        <td>Kecamatan: <span>{{$k->alamat->kecamatan}}</span></td>
                    </tr>
                    <tr>
                        <td>Kode pos: <span>{{$k->alamat->kodepos}}</span></td>
                    </tr>
                 </table>
            </div>
        </div>
    </div>
</section>

@endsection