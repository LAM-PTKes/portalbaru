@extends('awal.template.app')
@section('title', 'Penjamin Mutu Internal - LAM-PTKes')
@section('content')
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Penjamin Mutu Internal LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Penjamin Mutu Internal LAM-PTKes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty section-item text-center">
         <div class="container content">
             <div class="row">
                 <div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/arum.jpg') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Arum Atmawikarta, SKM, MPH</h4>
                             <h5>Ketua Penjamin Mutu Internal</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

@endsection
