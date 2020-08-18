@extends('toko.default')

@section('content')
@foreach($notif as $n)
<ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
    @if($n->id_status == 3)
    <li>
        <a href="{{route('show_penjualan_dibayar')}}" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
            
            <div class="container">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="vertical-align:top;">
                        <h3 style="color: #007ea8; font-size: 18px; font-weight: 400; line-height: 30px; margin-bottom: 1px; margin-top:0;">
                            pesanan <strong>{{$n->user->name}}</strong> {{$n->status->status}} </h3>
                        <span style="color:#737373; font-size:14px;">{{$n->updated_at}}</span>
                        </td>
                    </tr>
                </table>
            </div>
        </a>
    </li>
    @endif
</ul>
@endforeach

    @foreach($notif as $n)
    <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
        @if($n->id_status == 6)
        <li>
                <a href="{{route('show_penjualan_selesai')}}" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                    
                <div class="container">
                    <br>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                        <td style="vertical-align:top;">
                            <h3 style="color: #007ea8; font-size: 18px; font-weight: 400; line-height: 30px; margin-bottom: 1px; margin-top:0;">
                            pesanan <strong>{{$n->user->name}}</strong> {{$n->status->status}} </h3>
                            <span style="color:#737373; font-size:14px;">{{$n->updated_at}}</span>
                        </td>
                        </tr>
                    </table>
                </div>
                </a>
            </li>
            @endif
        </ul>
    @endforeach

    @foreach($notif as $n)
    <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
        @if($n->id_status == 10)
        <li>
                <a href="{{route('show_penjualan_selesai')}}" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                    
                <div class="container">
                    <br>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                        <td style="vertical-align:top;">
                            <h3 style="color: #007ea8; font-size: 18px; font-weight: 400; line-height: 30px; margin-bottom: 1px; margin-top:0;">
                            pesanan <strong>{{$n->user->name}}</strong> {{$n->status->status}} </h3>
                            <span style="color:#737373; font-size:14px;">{{$n->updated_at}}</span>
                        </td>
                        </tr>
                    </table>
                </div>
                </a>
            </li>
            @endif
        </ul>
    @endforeach
@endsection