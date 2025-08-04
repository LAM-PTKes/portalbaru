@extends('layouts.app')

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
                                     

                                        <div class="col-xl-6 ml-auto mr-auto">
                                            <div class="card p-4 rounded-plus bg-faded">
                                                @if (session('resent'))
                                                    <div class="alert alert-success text-dark" role="alert">
                                                        <strong>Successfully</strong> 
                                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                                    </div>
                                                @else
                                                    <div class="alert alert-info text-dark" role="alert">
                                                        <strong>Heads Up!</strong> 
                                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                                    </div>
                                                @endif
                                                <a href="{{ route('verification.resend') }}" class="h4">
                                                    <i class="fal fa-chevron-right mr-2"></i> 
                                                    {{ __('If you did not receive the email click here send again') }}
                                                </a>
                                            </div>
                                        </div>

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
@endsection

 {{-- @include('layouts.error') --}}