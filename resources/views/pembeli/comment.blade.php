@foreach($komen as $comment)

<div class="display-comment">
    <strong style="color: #007ea8">{{ $comment->user->name }}</strong>&nbsp
    @for ($a=1; $a<=$comment->transaksi->rating; $a++)
        <span style="color: #e8262d">★</span>
     @endfor
    <small>&nbsp {{Carbon\Carbon::parse($comment->created_at)->translatedFormat('d-M-Y')}}</small>
    <p>{{ $comment->body }}</p>
    @if(($comment->foto_rating)!=null)
    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$comment->id}}" style="margin-top: -20px">
        <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/'.$comment->user->id.'/'.'rating'.'/'.$comment->foto_rating)}}" style="width: 100px; height: 100px"   />
    </button>
    <br>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Ulasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{asset('user/'.$comment->user->id.'/'.'rating'.'/'.$comment->foto_rating)}}" style="width: 100; height: 100"   />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    </div>

 
    @if (isset($comment->replies))
    @foreach($comment->replies as $c)
    <div class="rounded" style="background-color: #ebeef2; margin-left:40px; margin-top: 5px; padding: 10px">
        <strong style="color: #007ea8; ">{{$c->toko->name}}</strong>&nbsp
        <p>{{ $c->body }}</p>
    </div>

    @endforeach
        {{--@include('pembeli.comment', ['komen' => $comment->replies])--}}
    @endif


</div>
@endforeach

<div class="block-27 d-flex flex-row-reverse align-center" style="margin-top: 10px">
{{$komen->links()}}
          </div>

