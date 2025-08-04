@extends('awal.template.app')
@section('title', 'Koordinator - LAM-PTKes')
@section('content')
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Koordinator LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Koordinator LAM-PTKes</li>
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
                             <img class="anima" src="{{ asset('lamptkes/images/soetrisno.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Soetrisno Soemardjo, MA</h4>
                             <h5>Koordinator Akreditasi</h5>
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
                             <h5>Koordinator Pengembangan, Pelatihan dan Sertifikasi</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

@endsection
