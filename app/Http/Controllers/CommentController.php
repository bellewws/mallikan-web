<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Comment;
use DB;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $comment->produk_id = $request->produk_id;
        $produk = Produk::find($request->get('produk_id'));
        $produk->comments()->save($comment);
        return back();
        
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $reply->produk_id = $request->produk_id;
        $produk = Produk::find($request->get('produk_id'));

        $produk->comments()->save($reply);

        return back();


    }
}
