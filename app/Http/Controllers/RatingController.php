<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toko;
use App\Produk;
use App\JenisProduk;
use App\KategoriProduk;
use App\Transaksi;
use App\Province;
use App\City;
use App\Comment;
use App\Courier;
use App\AlamatUser;
use App\Pembayaran;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Auth;
use App\StatusPembelian;
use DB;
use Carbon;
use App\User;

class RatingController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $pesanan = Transaksi::where('id',$id)->where('id_user', $user->id)->with(['jenis','kategori','toko','produk','status'])->first();
        // dd($pesanan);
        $data = [
            'p'=>$pesanan,
            'notif'=>$this->getStatusUser(),
        ];


        return view('pembeli.pesanan.rating', $data);
    }
    public function rating(Request $request, $id)
    {
        $user = Auth::user()->id;
        $rating = Transaksi::find($id);
        $rating->rating = $request->input('rating');

        $comment = new Comment;
        $comment->body = $request->input('komentar');
        $comment->transaksi_id = $id;
        $comment->toko_id = $request->input('id_toko');
        $comment->produk_id = $rating->id_produk;
        $comment->user_id = $user;
        // dd($request->rating);
        // dd($comment);


        if ($request->hasFile('foto_rating')) {
            $file = $request->file('foto_rating');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('user/'.$user.'/rating'.'/', $filename);
            $comment->foto_rating = $filename;
        } else {
            // return $request;
            $comment->foto_rating = '';
        }

        // dd($comment->foto_rating);

        $rating->comments()->save($comment);
        $rating->save();
        return redirect()->route('show_pesanan_selesai');

    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $reply->toko_id = $request->get('toko_id');
        $reply->produk_id = $request->produk_id;
        $reply->transaksi_id = $request->transaksi_id;
        $produk = Produk::find($request->get('produk_id'));

        $produk->comments()->save($reply);

        return back();


    }

    public function getStatusUser(){

        $user = User::where('id', Auth::user()->id)->first();

        $notif = Transaksi::where('id_user',$user->id, 'and')->whereIn('id_status',[3,4,5,7])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
        // dd($notif);
        return $notif;
    
    }
}
