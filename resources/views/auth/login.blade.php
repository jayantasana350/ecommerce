{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('frontend.master')

@section('content')
<div class="offcanvas-overlay"></div>
<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="index.html">Home</a></li>
                            <li>Login / Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Breadcrumb Area End-->
        <!-- login area start -->
        <div class="login-register-area mtb-60px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4>login</h4>
                                </a>
                                <a data-bs-toggle="tab" href="#lg2">
                                    <h4>register</h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" placeholder="example@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                     @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        {{-- <input type="checkbox" /> --}}
                                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <a class="flote-none" for="remember" href="javascript:void(0)">{{ __('Remember Me') }}</a>

                                                        @if (Route::has('password.request'))
                                                            <a class="" href="{{ route('password.request') }}">
                                                                {{ __('Forgot Your Password?') }}
                                                            </a>
                                                        @endif


                                                    </div>
                                                    <button type="submit"><span>{{ __('Login') }}</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <label for="name" class="col-md-4 col-form-label">{{ __('Full Name') }}</label>
                                                <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" placeholder="Enter Your Full Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                                                <input id="email" type="email" class="@error('email') is-invalid @enderror" placeholder="example@email.com" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                                                <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="" name="password_confirmation" required autocomplete="new-password">

                                                <div class="button-box">
                                                    <button type="submit"><span>{{ __('Register') }}</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login area end -->
@endsection
