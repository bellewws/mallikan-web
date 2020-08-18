@extends('admin.default')
@section('content')
<section >
    <div class="container-fluid" >
        <div class="row">
            <div class="col-sm-12 text-center mb-3">
            @if(isset($barcode))
                <a href="{{route('edit_barcode', $barcode->id)}}" class="btn btn-danger" style="display: inline-block; vertical-align: top;">Edit</a>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                        <img src="{{asset('admin/barcode/'.$barcode->foto)}}" width="300" height="300" />    
                                    </td>
                                </tr>
                            </table>
                            <p style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> <span>No HP :</span> {{$barcode->nomor}} </p> <br>
                        </td>
                    </tr>
                </table>
            @else
                <a href="{{route('create_barcode')}}" class="btn btn-primary" style="display: inline-block; vertical-align: top;">Tambah</a>
                <br>
                <br>    
                <h1><strong>Anda belum mengunggah barcode pembayaran</strong></h1>
            @endif
             </div>
        </div>

    </div>
</section>
@endsection