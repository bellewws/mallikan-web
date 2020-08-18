<a href="" id="reply"></a>
<form method="post" action="{{ route('reply_komentar') }}">
@csrf

@foreach($comments as $comment)
<div class="form-group">  
    <input type="hidden" name="transaksi_id" value="{{ $k->id }}" />
    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
    <input type="hidden" name="produk_id" value="{{ $k->id_produk }}" />
    <input type="hidden" name="toko_id" value="{{ $comment->toko_id }}" />
</div>
<div class="display-comment" style="margin-left:40px;">
@if($comment->user->boolean_penjual == false)
    <strong>{{ $comment->user->name }}</strong>&nbsp<small>{{Carbon\Carbon::parse($comment->created_at)->translatedFormat('d-M-Y')}}</small>
    <p>{{ $comment->body }}</p>
    @if(($comment->foto_rating)!=null)
    <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/'.$comment->user->id.'/'.'rating'.'/'.$comment->foto_rating)}}" width="135" height="135" />
    <br><br>
    @endif
    <input type="text" name="comment_body" class="form-control" placeholder="Ketik untuk membalas..."/>
    <br>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Balas" />
    </div>
@else
    <strong>{{ $k->toko->name }}</strong>&nbsp<small>{{Carbon\Carbon::parse($comment->created_at)->translatedFormat('d-M-Y')}}</small>
    <p>{{ $comment->body }}</p>
@endif   
    @include('pembeli._comment_replies', ['comments' => $comment->replies])
</div>
@endforeach
</form>
