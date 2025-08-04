{{-- @extends('layouts.app')
@section('title')
    Register 
@endsection
@section('content')

        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <img src="{{ asset('web/logo-lam-214.png') }}" alt="AlihBentuk WebApp" style="width: 50px; height:auto; ">
                                    <span class="page-logo-text mr-1">Portal WebApp</span>
                                </a>
                            </div>
                            <span class="text-white opacity-50 ml-auto mr-2 hidden-sm-down">
                                Already a member?
                            </span>
                            <a href="{{ route('login') }}" class="btn-link text-white ml-auto ml-sm-0">
                                Secure Login
                            </a>
                        </div>
                    </div>
                    <div class="flex-1" style="background: url({{ asset('admin/dist/img/svg/pattern-1.svg') }}) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <div class="row">
                                <div class="col-xl-6 ml-auto mr-auto">
                                    <div class="card p-4 rounded-plus bg-faded">
                                        <div class="alert alert-primary text-dark" role="alert">
                                            <center>
                                                <strong>Registrasi!</strong> Isi Data Dengan Benar.
                                            </center>
                                        </div>
                                        
                                        <form method="POST" action="{{ route('register') }}" class="was-validated">
                                            @csrf

                                            <div class="form-group">
                                                <label class="form-label" for="name">Nama Lengkap</label>
                                                <input type="text" id="name" name="name" class="form-control is-valid{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Nama Lengkap" required>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @else
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="text" id="email" name="email" class="form-control is-valid{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Alamat Email" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Email Tidak Valid</strong>
                                                    </span>
                                                @else
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="pass">Password</label>
                                                <input type="password" id="pass" name="password" class="form-control is-valid" placeholder="minimal 8 karakter" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Password Minimal 6 Karakter</strong>
                                                    </span>
                                                @else
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                @endif
                                            </div>

                                            <center>
                                                <button type="submit" class="btn btn-outline-info waves-effect waves-themed">
                                                    {{ __('Register') }}
                                                </button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            2020 © Portal WebApp by &nbsp; IT LAM-PTKes 
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection --}}

@include('layouts.error')