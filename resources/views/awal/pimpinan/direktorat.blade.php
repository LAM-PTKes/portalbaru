@extends('awal.template.app')
@section('title', 'Direktorat - LAM-PTKes')
@section('content')
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Direktorat LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Direktorat LAM-PTKes</li>
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
                             <img class="anima" src="{{ asset('lamptkes/images/soetrisno.jpg') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Soetrisno Soemardjo, MA</h4>
                             <h5>Direktur Akreditasi</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/elly.jpg') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Prof. Dra. Elly Nurachmah, M.App.SC., DNSc</h4>
                             <h5>Sekretaris</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/nursamsiah.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dra. Nursamsiah Asharini, M.Si</h4>
                             <h5>Direktur Umum dan Penunjang</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/arum.jpg') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Arum Atmawikarta, SKM, MPH</h4>
                             <h5>Direktur R&D</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

@endsection
