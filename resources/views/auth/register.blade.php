@extends('layouts.portal')

@section('content')
<div class="container" >
    <br>
    <img class="center" src="/images/mallikan1.png" alt="" width=100 height=50>
    <div class="row justify-content-center">
        <div class="col-md-7 justify-content-center">
            <br>
            <br>
            <div class="rounded" >
                <div class="rounded border">
                    <div class="text-center" style="padding: 10px">
                        <h4>Daftar Sekarang</h4>
                        <label style="inline">Sudah punya akun?</label>
                        <a style="inline; text-color: #fff" href="{{ route('login') }}">Masuk</a>
                    </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>

                                <div class="col-md">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                <div class="col-md">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                                <div class="col-md">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                <div class="col-md">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="no_kontak" class="col-md-4 col-form-label text-md-left">{{ __('No Handphone') }}</label>

                                <div class="col-md">
                                    <input id="no_kontak" type="no_kontak" class="form-control @error('no_kontak') is-invalid @enderror" name="no_kontak" value="{{ old('no_kontak') }}" required autocomplete="email">

                                    @error('no_kontak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                    <button type="submit" class="btn btn-primary" style="width: 200px">
                                        {{ __('Buat Akun') }}
                                    </button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-1 center">
                        
            </div>
            <div class="col-md-4 center">
                <br>
                <img class="center" src="/images/login-icon.png" alt="" style="padding-top:20px; padding-bottom: 20px">
            </div>
        </div>
        
    </div>
</div>
@endsection
