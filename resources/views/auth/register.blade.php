@extends('layouts.login-regis')

@push('prepend-style')
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Login & Regis/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login & Regis/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login & Regis/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login & Regis/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login & Regis/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login & Regis/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login & Regis/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login & Regis/css/main.css') }}">
    <!--===============================================================================================-->
@endpush

@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Registrasi
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Username</span>
                        <input id="name" class="input100 @error('name') is-invalid @enderror" type="text"
                            name="name" placeholder="Masukkan Nama Anda" value="{{ old('name') }}" required
                            autocomplete="name" autofocus>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Email</span>
                        <input class="input100 @error('email') is-invalid @enderror" type="email" name="email"
                            placeholder="Masukkan Email Anda" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input id="password" class="input100 @error('password') is-invalid @enderror" type="password"
                            name="password" placeholder="Masukkan Password Anda" required autocomplete="current-password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>


                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Konfirmasi Password</span>
                        <input id="password-confirm" class="input100 @error('password') is-invalid @enderror"
                            type="password" name="password_confirmation" placeholder="Masukkan Ulang Password Anda" required
                            autocomplete="new-password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>


                        @error('confirm-password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="container-login100-form-btn mt-3">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>

                    <div class="flex-col-c p-t-25">
                        <span class="txt1 p-b-17">
                            Sudah punya akun? <a href="{{ route('login') }}" class="txt2" style="font-weight: 700">
                                Login
                            </a>
                        </span>


                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
