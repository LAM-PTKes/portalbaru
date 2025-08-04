@extends('layouts.app')
@section('title')
    Login Portal WebApp
@endsection
@section('content')

    <div style="background: url({{ asset('web/bg2.jpg') }}) no-repeat center center fixed;background-size: cover; height:  100%; position: absolute; width: 100%;">
        <div class="blankpage-form-field" style="">
            <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                    <img src="{{ asset('web/logo-lam-214.png') }}" alt="Portal WebApp" style="width: 50px; height:auto; ">
                    <span class="page-logo-text mr-1">Portal WebApp</span>
                    <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                </a>
            </div>
            <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                <form method="POST" action="{{ route('login') }}" class="was-validated">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input type="email" name="email" id="username" class="form-control is-valid" placeholder="Username" required="">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                {{-- <strong>{{ $errors->first('email') }}</strong> --}}
                                <strong>Username/Password Salah</strong>
                            </span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control is-valid" placeholder="password" required="">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                {{-- <strong>{{ $errors->first('password') }}</strong> --}}
                                <strong>Password Salah</strong>
                            </span>
                        @endif

                    </div>

                    {{-- <div class="form-group text-left">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme"> Remember me for the next 30 days</label>
                        </div>
                    </div>
                     --}}
                    <button type="submit" class="btn btn-outline-success waves-effect waves-themed float-right">
                        <span class="fal fa-lock-open-alt mr-1"></span>
                        Secure login
                    </button>
                </form>
            </div>
            {{-- <div class="blankpage-footer text-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"><strong style="color: black;">Recover Password</strong></a>
                @endif
                    || <a href="{{ route('register') }}"><strong style="color: black;">Register Account</strong></a>
            </div> --}}
        </div>
        <div class="login-footer p-2">
            <div class="row">
                <div class="col col-sm-12 text-center">
                    <i><strong style="color: white;">System Date: {{ date('d F Y H:i:s') }}</strong></i>
                </div>
            </div>
        </div>
        {{-- <video poster="{{ asset('admin/dist/img/backgrounds/clouds.png') }}" id="bgvid" playsinline autoplay muted loop>
            <source src="{{ asset('admin/dist/media/video/cc.webm') }}" type="video/webm">
            <source src="{{ asset('admin/dist/media/video/cc.mp4') }}" type="video/mp4">
        </video> --}}
    </div>
@endsection  