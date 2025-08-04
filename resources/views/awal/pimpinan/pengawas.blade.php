@extends('awal.template.app')
@section('title', 'Pengawas - LAM-PTKes')
@section('content')
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Pengawas LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Pengawas LAM-PTKes</li>
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
                             <img class="anima" src="{{ asset('lamptkes/images/hardinsyah.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Prof. Dr. Ir. H. Hardinsyah, MS</h4>
                             <h5>Ketua Pengawas</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/bambang.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>dr. Bambang Wibowo, Sp.O.G, Subsp. K.Fm, MARS, FISQua</h4>
                             <h5>Anggota</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/yuli.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>dr. Yuli Farianti, M.Epid</h4>
                             <h5>Anggota</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/widyastuti.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>dr. Widyastuti, MKM</h4>
                             <h5>Anggota</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		</div>
		<hr class="space" />
            	<div class="row">
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/berry.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Berry Juliandi, M.Si</h4>
                             <h5>Anggota</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		</div>
             </div>
         </div>
     </div>

@endsection
