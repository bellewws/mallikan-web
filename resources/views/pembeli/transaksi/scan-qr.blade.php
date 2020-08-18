@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 ftco-cart">
    <div class="container">
    <div class="card card-2" style="padding-left: 20px">                 
        <form action="{{route('submit_pesanan', $pesanan->id)}}" class="billing-form" method="post" enctype="multipart/form-data">
        @csrf
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                      
                        <tr>
                            <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                    <tr>
                                        <h6 style="font-size: 20px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">Gunakan Aplikasi OVO untuk Pembayaran</h6> 
                                        <br>
                                        
                                        <td align="center" style="line-height: 24px; padding-top: 25px;"> <img src="{{asset('admin/barcode/'.$barcode->foto)}}" width="300" height="300" />
                                            
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td align="left" style="padding-top: 20px;">
                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                    <ul>
                                                        <li>
                                                            {{--  <p style="color: #007ea8">{{$courier->title}} (Pilih Layanan Pengiriman)</p></li>
                                                            <input type="text" style="display:none" name="kurir" value="{{$courier->title}}"></input>
                                                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                                        @foreach ($cost[0]['costs'] as $c)
                                                            
                                                        @foreach ($c['cost'] as $cs)
                                                        <input type="radio" value="{{$cs['value']}}" id="ongkir" name="layanan"> {{$c['service']}}
                                                            <span name="harga" value="{{$cs['value']}}">Rp {{Number_format($cs['value'])}}</span>
                                                            <span name="estimasi">Estimasi {{$cs['etd']}} hari</span>
                                                            <br>    
                                                        </input>
                                                        @endforeach
                                                        
                                                        @endforeach</p>  --}}
                                                        <h5 style="color: red">*setelah melakukan pembayaran, uang tidak dapat dikembalikan</h5>
                                                        <li><p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Scan barcode. </p>
                                                        </li>
                                                        <li><p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Harap melakukan pembayaran dengan nomor handphone Anda yang terdaftar disini <strong style="color: #007ea8">{{$user->no_kontak}}</strong></p>
                                                        </li>
                                                        <li><p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Harap memasukan kode transaksi ini <strong style="color: #007ea8">{{$pesanan->kode}}</strong>  dan <strong style="color: #007ea8">mallikan.com </strong> pada kolom pesan(opsional) </p>
                                                        </li>
                                                        <li><p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Nomor tujuan untuk transafer sesama OVO adalah <strong style="color: #007ea8">0822 2773 8902</strong> </p>
                                                        </li>
                                                        <li><p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Setelah melakukan pembayaran harap Anda mengklik tombol <strong style="color: #007ea8">Sudah Bayar</strong> dibawah ini. </p>
                                                        </li>
                                                    </ul>
                                               
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                            <td align="left" style="padding-top: 20px;">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                            
                                    <tr>
                                        <td align="center" style="padding: 25px 0 15px 0;">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">Sub Total</td>
                                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;" >
                                                    <input type="number" id="sub_total" style="display:none" name="sub_total" value="{{$pesanan->subtotal}}"></input>
                                                    <p>Rp {{Number_format($pesanan->subtotal)}}</p>
                                                    
                                                    </td>                           
                                                </tr>
                                                <tr>
                                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">Ongkos Kirim</td>
                                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">Rp 
                                                        <p id="display_ongkir">{{Number_format($pesanan->biaya_ongkir)}}</p>
                                                        <input type="number" style="display:none" id="display_ongkir" name="display_ongkir" value="{{$pesanan->biaya_ongkir}}">
                                                    </td>                           
                                                </tr>
                                                <tr>
                                                    <td width="75%" align="left" style="color: #007ea8; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">Total Dibayar</td>
                                                    <td width="25%" align="left" style="color: #007ea8; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;" ><p> Rp </p>
                                                        <p id="total">{{Number_format($pesanan->total_harga)}}</p>
                                                    <input type="number" id="total"name="total" style="display:none" value="{{$pesanan->total_harga}}"></input>
                                                    </td>                           
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td align="center" >
                                <table align="center" border="0" cellpadding="0" cellspacing="0" >
                                   
                                    <tr>
                                        <td align="center" style="padding: 25px 0 15px 0;">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center" style="border-radius: 5px;"> <button href="{{route('show_konfirmasi')}}" type="submit" class="btn btn-primary py-3 px-5" role="button">Sudah Dibayar</button> </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
        </table>
        </form>
    </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('input[type=radio][name=layanan]').change(function() {			
    // $('#ongkir').change(function(){
        // var $selected_value = $('input[name^="layanan"]');
        var selected_value = $("input[name='layanan']:checked").val();
        // selected_value_total = selected_value.toLocaleString();

        $('#display_ongkir').html(selected_value).toLocaleString();;
        // alert(selected_value_total);
        // $selected_value.change(function() {
    //$('input[name^="txtChecked"]').each(function() {
      //var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
            calculateTotal();
    //});
//   });
    });
            
});

function calculateTotal() {
  var total = 0;    
  $("input[name='layanan']:checked").each(function(){
    var val = parseFloat($("input[name='layanan']:checked").val());
    var val2 = parseFloat($("input[name='sub_total']").val());

    total = val+val2;
    ongkir = val;
    ongkir_string = val.toLocaleString();
    total_string = total.toLocaleString();
    $("input[id='display_ongkir']").val(ongkir);
    $("input[id='total'").val(total);


    // console.log(ongkir_string);

  });

  $("p[id='total']").html(total_string);
  $("p[id='total_hidden']").html(total);

  
  $("p[id='display_ongkir']").html(ongkir_string);

}
</script>
@endpush