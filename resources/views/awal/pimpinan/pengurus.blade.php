@extends('awal.template.app')
@section('title', 'Pengurus - LAM-PTKes')
@section('content')
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Pengurus LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Pengurus LAM-PTKes</li>
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
                             <img class="anima" src="{{ asset('lamptkes/images/usman-chatib.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Prof. dr. Usman Chatib Warsa, Sp.MK., PhD</h4>
                             <h5>Ketua LAM-PTKes</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/soetrisno.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Soetrisno Soemardjo, MA</h4>
                             <h5>Wakil Ketua 1</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/arum.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Arum Atmawikarta, SKM, MPH</h4>
                             <h5>Wakil Ketua 2</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/elly.png') }}" alt="" />
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
                             <img class="anima" src="{{ asset('lamptkes/images/darminto.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Darminto S.E., MBA., C.A</h4>
                             <h5>Bendahara</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>

@endsection
