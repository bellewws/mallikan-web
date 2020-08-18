<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'RecommendationController@index')->name('portal');


Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'AdminController@home');

Route::get('/kategori/{kategori}', 'ProdukController@showkategori')->name('show_kategori');
Route::get('/cat', 'ProdukController@cat')->name('cat');
Route::get('/produk', 'ProdukController@all')->name('all');
Route::get('/search', 'ProdukController@search')->name('search');
Route::post('/filter', 'ProdukController@filter')->name('filter');
Route::get('/list/{id}', 'ProdukController@list')->name('list');
Route::get('/rekomendasi', 'RekomendasiController@index')->name('rekomendasi');
Route::get('/algoritma', 'AlgoritmaController@index')->name('algoritma');
Route::get('/similarity', 'AlgoritmaController@similarityDistance')->name('similarity');
Route::get('/recommendation', 'RecommendationController@index')->name('recommendation');

Route::get('pagination/fetch_data/{id}', 'ProdukController@fetch_data');





Route::group(['prefix' => 'detail'], function() {
    Route::get('/shop', 'ProdukController@shop')->name('shop_detail');
    Route::get('/toko/{id}', 'ProdukController@toko')->name('toko_detail');
    Route::get('/produk/{id}', 'ProdukController@detail')->name('show_detail');
    Route::post('/loadmore/load_data', 'ProdukController@detail')->name('loadmore.load_data');
});


Route::group(['middleware' => ['auth','verified']], function(){
    // chat
    Route::get('/chat', 'ChatController@index')->name('chat');
    Route::get('/message/{id}', 'ChatController@getMessage')->name('message');
    Route::post('message', 'ChatController@sendMessage');
    Route::post('/rating/{id}', 'RatingController@rating')->name('rating');


    Route::group(['prefix' => 'admin'], function(){
        Route::get('/index', 'AdminController@index')->name('index_admin');
        Route::get('/register', 'Auth\AdminRegisterController@index')->name('register_admin');
        Route::post('/register-admin', 'Auth\AdminRegisterController@create')->name('register_admin');
        Route::get('/products/index', 'AdminController@product')->name('products_admin');

        //users dan toko
        Route::get('/users', 'AdminController@getUser')->name('get_user');
        Route::get('/toko', 'AdminController@getToko')->name('get_toko');


        //upload barcode
        Route::get('/upload/barcode', 'AdminController@showbarcode')->name('show_barcode_admin');
        Route::get('/barcode/create', 'AdminController@create')->name('create_barcode');
        Route::post('/barcode/store', 'AdminController@insert')->name('insert_barcode');
        Route::get('/barcode/edit/{id}', 'AdminController@edit')->name('edit_barcode');
        Route::put('/barcode/update/{id}','AdminController@update')->name('update_barcode');

        
        //jenis produk
        Route::get('/produk/jeniss', 'JenisProdukController@index')->name('jenis_produk');
        Route::get('/produk/jenis/add', 'JenisProdukController@add')->name('jenis_produk_add');
        Route::post('/produk/jenis/store', 'JenisProdukController@insert')->name('jenis_produk_insert');
        Route::get('/produk/jenis/edit/{id}','JenisProdukController@edit')->name('jenis_produk_edit');
        Route::put('/produk/jenis/update/{id}','JenisProdukController@update')->name('jenis_produk_update');
        Route::get('/produk/jenis/delete/{id}','JenisProdukController@delete')->name('jenis_produk_delete');

        //transaksi
        Route::get('/transaksi-menunggu-konfirmasi','AdminTransaksiController@konfirmasi')->name('show_transaksi_menunggu_konfirmasi');
        Route::get('/transaksi-batal/{id}','AdminTransaksiController@batal')->name('transaksi_batal');
        Route::get('/transaksi-berhasil/{id}','AdminTransaksiController@berhasil')->name('transaksi_berhasil');
        Route::get('/transaksi-proses','AdminTransaksiController@showproses')->name('show_transaksi_proses');
        Route::get('/transaksi-selesai','AdminTransaksiController@showselesai')->name('show_transaksi_selesai');
        Route::get('/pembayaran-penjual','AdminTransaksiController@pembayaranAll')->name('pembayaran_all');
        Route::post('/transfer-penjual/{id}','AdminTransaksiController@transferInsert')->name('transfer_penjual');

    
        //prediksi
        Route::get('/prediksi','LinearRegresiController@indexnew')->name('prediksi.index');
        Route::get('/hasil-prediksi','LinearRegresiController@pricePredict')->name('hasilPrediksi.index');
        Route::get('/histori-harga','LinearRegresiController@historiHarga')->name('histori.harga');
        Route::post('/prediksi-post','LinearRegresiController@filter')->name('prediksi.filter');
        // Route::get('/prediksi/new','LinearRegresiController@indexnew')->name('prediksi_indexnew');
    });

    Route::group(['prefix' => 'toko'], function(){
        Route::get('/index', 'TokoController@index')->name('toko_index');
        Route::get('/create', 'ProfilTokoController@create')->name('toko_create_index');
        Route::get('/profile', 'ProfilTokoController@index')->name('toko_profil_index');
        Route::post('/profile/store', 'ProfilTokoController@store')->name('toko_profile_store');
        Route::get('/profile/edit/{id}', 'ProfilTokoController@edit')->name('toko_profil_edit');
        Route::put('/profile/update/{id}', 'ProfilTokoController@update')->name('toko_profile_update');
        

        // notif toko
        Route::get('/notifikasi', 'NotifikasiController@notiftoko')->name('toko_notif');

        //pesanan
        Route::group(['prefix' => 'penjualan'], function() {
            Route::get('/semua', 'TokoController@showall')->name('show_penjualan_semua');
            Route::get('/batal', 'TokoController@showbatal')->name('show_penjualan_batal');
            Route::get('/selesai', 'TokoController@showselesai')->name('show_penjualan_selesai');
            Route::get('/dibayar', 'TokoController@show')->name('show_penjualan_dibayar');
            Route::get('/batal/{id}','TokoController@batal')->name('penjualan_batal');
            Route::get('/proses/{id}','TokoController@proses')->name('penjualan_proses');
            Route::get('/diproses', 'TokoController@showdiproses')->name('show_penjualan_diproses');
            Route::put('/insert-resi/{id}', 'TokoController@insertResi')->name('insert_resi');
            Route::get('/dikirim', 'TokoController@showdikirim')->name('show_penjualan_dikirim');
            Route::get('/detail/{id}', 'TokoController@showdetail')->name('show_penjualan_detail');
            Route::get('/transfer-admin', 'TokoController@showTransfer')->name('show_penjualan_transfer');
            Route::post('/reply', 'RatingController@replyStore')->name('reply_komentar');
            Route::get('/prediksi-harga', 'LinearRegresiController@index')->name('prediksi_harga'); 
            
            Route::get('/chart', 'ChartController@index')->name('chart');
            Route::get('/chart/table', 'ChartController@showTable')->name('show_chart_table'); 
        });

        Route::group(['prefix' => 'produk'], function(){
            Route::get('/welcome', 'ProdukTokoController@welcome')->name('produk_welcome');
            Route::get('/index', 'ProdukTokoController@index')->name('produk_index');
            Route::get('/create', 'ProdukTokoController@create')->name('produk_create');
            Route::post('/store', 'ProdukTokoController@store')->name('produk_store');
            Route::get('/show', 'ProdukTokoController@show')->name('produk_show');
            Route::get('/edit/{id}','ProdukTokoController@edit')->name('produk_edit');
            Route::put('/update/{id}','ProdukTokoController@update')->name('produk_update');
            Route::get('/delete/{id}','ProdukTokoController@delete')->name('produk_delete');
        });

    });

    
    Route::group(['prefix' => 'user'], function() {
        Route::get('/notifikasi', 'NotifikasiController@notifuser')->name('user_notif');

        Route::group(['prefix' => 'alamat'], function(){
            Route::get('/', 'AlamatUserController@index')->name('alamat_index');
            Route::get('/create', 'AlamatUserController@create')->name('alamat_create');
            Route::post('/store', 'AlamatUserController@store')->name('alamat_store');
            Route::post('/insert', 'AlamatUserController@insert')->name('alamat_insert');
            Route::get('/edit/{id}','AlamatUserController@edit')->name('alamat_edit');
            Route::put('/update/{id}','AlamatUserController@update')->name('alamat_update');
            Route::put('/ubah/{id}','AlamatUserController@ubah')->name('alamat_ubah');
            Route::get('/delete/{id}','AlamatUserController@delete')->name('alamat_delete');
        });
        // transaksi
        Route::post('/cart/{id}', 'TransaksiController@store')->name('transaksi_store');
        Route::get('/cart', 'TransaksiController@cart')->name('cart_index');
        Route::get('/cart/delete/{id}', 'TransaksiController@deletecart')->name('cart_delete');
        Route::get('/checkout', 'TransaksiController@checkout')->name('checkout');

        // comment
        Route::post('/comment/store', 'CommentController@store')->name('comment.add');
        Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

        // Route::get('/scan-qr/{id}', 'TransaksiController@showbarcode')->name('show_barcode');

        //profile
        Route::get('/profile', 'PembeliDashboardController@showprofile')->name('show_profile');
        Route::get('/profile/edit/{id}', 'PembeliDashboardController@edit')->name('pembeli_profile_edit');
        Route::put('/profile/update/{id}', 'PembeliDashboardController@update')->name('pembeli_profile_update');

        //pesanan
        Route::get('/pesanan/semua', 'PembeliDashboardController@showall')->name('show_pesanan_semua');
        Route::get('/pesanan/batal', 'PembeliDashboardController@showbatal')->name('show_pesanan_batal');
        Route::get('/pesanan/selesai', 'PembeliDashboardController@showselesai')->name('show_pesanan_selesai');
        Route::get('/pesanan/belum-bayar', 'PembeliDashboardController@show')->name('show_pesanan_belum_bayar');
        Route::get('/pesanan/diproses', 'PembeliDashboardController@showdikemas')->name('show_pesanan_dikemas');
        Route::post('/pesanan/batal/{id}', 'PembeliDashboardController@batal')->name('pesanan_batal');
        Route::get('/pesanan/dikirim', 'PembeliDashboardController@showdikirim')->name('show_pesanan_dikirim');
        Route::post('/pesanan/diterima/{id}', 'PembeliDashboardController@diterima')->name('pesanan_diterima');
        Route::get('/pesanan/detail/{id}', 'PembeliDashboardController@showorder')->name('show_order_detail');
        Route::post('/checkout', 'TransaksiController@insertCheckOut')->name('checkout');
        Route::get('/checkout/{id}', 'TransaksiController@checkOutIndex')->name('checkout_index');
        Route::get('/rating/{id}', 'RatingController@index')->name('rating_index'); 

        Route::get('/province/{id}/cities', 'TransaksiController@getCities')->name('getCities');
        Route::get('/bayar/{id}', 'TransaksiController@bayar')->name('bayar');
        Route::post('/pembayaran/{id}', 'TransaksiController@submitCheckOut')->name('submit_checkout');
        Route::post('/konfirmasi/{id}', 'TransaksiController@submitPesanan')->name('submit_pesanan');
        Route::get('/konfirmasi', 'TransaksiController@showKonfirmasi')->name('show_konfirmasi');

        Route::post('/kurir/{id}/layanan', 'TransaksiController@getKurir')->name('getKurir');
        Route::post('/service', 'TransaksiController@getService')->name('getService');

        // example
        Route::post('/second-service', 'TransaksiController@getServiceExample')->name('getServiceExample');

    });

    // Route::group(['prefix' => 'transaksi'], function() {
    //     Route::get('/', 'TransaksiController@index')->name('checkout_index');
    // });

});

Route::get('/linreg', 'LinearRegresiController@linreg')->name('linreg');
Route::post('/prediksi', 'LinearRegresiController@pricePredict')->name('prediksi');

