@extends('layouts.portal')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="#">Home</a></span> <span>Checkout</span></p>
          <h1 class="mb-0 bread">Checkout</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
                      <form action="#" class="billing-form">
                          <h3 class="mb-4 billing-heading">Detail Pembayaran</h3>
                <div class="row align-items-end">
                    <div class="col-md-12">
                  <div class="form-group">
                      <label for="firstname">Nama</label>
                    <input type="text" class="form-control" placeholder="Ex: Ardiyan Pramudita">
                  </div>
                </div>
                {{--  <div class="col-md-6">
                  <div class="form-group">
                      <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
              </div>  --}}
              <div class="w-100"></div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="country">Kota</label>
                          <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                            <option value="">Jakarta Utara</option>
                            <option value="">Jakarta Barat</option>
                        </select>
                      </div>
                      </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label for="streetaddress">Alamat</label>
                    <input type="text" class="form-control" placeholder="Ex: Jalan Budi Mulia RT/RW">
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="" class="form-control">
                                <option value="">Pademangan</option>
                                <option value="">Ancol</option>
                            </select>
                          </div>
                  </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label for="towncity">Kelurahan</label>
                    <input type="text" class="form-control" placeholder="Ex: Pademangan Barat">
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="postcodezip">Kodepos</label>
                    <input type="text" class="form-control" placeholder="Ex: 14420">
                  </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="phone">Nomor Handphone</label>
                    <input type="text" class="form-control" placeholder="Ex: 082227738902">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="dateorder">Tanggal Pengiriman</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12">
                <label for="phone">Jasa Pengiriman</label>
                <div class="form-group ">
                   
                    <div class="radio">
                    <label class="mr-3"><input type="radio" name="optradio"> GrabExpress </label>
                    <label><input type="radio" name="optradio"> GoSend</label>
                    </div>
                </div>
              </div>
              </div>
            </form><!-- END -->
                  </div>
                  <div class="col-xl-5">
            <div class="row mt-5 pt-3">
                <div class="col-md-12 d-flex mb-5">
                    <div class="cart-detail cart-total p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Cart Total</h3>
                        <p class="d-flex">
                                  <span>Subtotal</span>
                                  <span>$20.60</span>
                              </p>
                              <p class="d-flex">
                                  <span>ongkos kirim</span>
                                  <span>$0.00</span>
                              </p>
                              <hr>
                              <p class="d-flex total-price">
                                  <span>Total</span>
                                  <span>$17.60</span>
                              </p>
                              </div>
                </div>
                <div class="col-md-12">
                    <div class="cart-detail p-3 p-md-4">
                        {{--  <h3 class="billing-heading mb-4">Payment Method</h3>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="checkbox">
                                             <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                          </div>
                                      </div>
                                  </div>  --}}
                                  <p><a href="#"class="btn btn-primary py-3 px-4">Pesan</a></p>
                              </div>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->

@endsection