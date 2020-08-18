@extends('layouts.portal')

@section('content')
<div class="container">
    <br>
    <img class="center" src="/images/mallikan1.png" alt="" width=100 height=50>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <br>
        <br>
            <div class="rounded" >
                <div class="rounded border">
                    <div class="text-center" style="padding: 10px;">
                        <h4>Masuk ke Akun</h4>
                        <label style="inline">Belum punya akun?</label>
                        <a style="inline; text-color: #fff" href="{{ route('register') }}">Daftar disini</a>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail') }}</label>
                            <div class="col-md">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>--}}

                        <div class="form-group mb-0 text-center">
                                <button type="submit" class="btn btn-primary" style="width: 200px">
                                    {{ __('Login') }}
                                </button>

                                {{--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif--}}
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <br>
            <img class="center" src="/images/login-icon.png" alt="">
        </div>
    </div>
    
</div>
@endsection
