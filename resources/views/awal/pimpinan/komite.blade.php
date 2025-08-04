@extends('awal.template.app')
@section('title', 'Komite Akreditasi - LAM-PTKes')
@section('content')
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Komite Akreditasi LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Komite Akreditasi</li>
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
                             <img class="anima" src="{{ asset('lamptkes/images/insan.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>dr. Insan Sosiawan A. Tunru, Ph.D</h4>
                             <h5>Komite Akreditasi Kedokteran</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/mia.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. drg. Mia Damiyanti, M.Pd., Ph.D</h4>
                             <h5>Komite Akreditasi Kedokteran Gigi</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/hadi.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Muhammad Hadi, SKM., M.Kep</h4>
                             <h5>Komite Akreditasi Keperawatan</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/lindaratna.jpg') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Linda Ratna Wati, S.ST, M.Kes</h4>
                             <h5>Komite Akreditasi Kebidanan</h5>
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
                             <img class="anima" src="{{ asset('lamptkes/images/djoko.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Prof. Dr. apt. Djoko Wahyono, SU.</h4>
                             <h5>Komite Akreditasi Farmasi</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/trina.png') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Prof. Dr. Ir. Trina Astuti, MPS</h4>
                             <h5>Komite Akreditasi Gizi</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/ridwanthaha.jpg') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Dr. Ridwan Mochtar Thaha, M.Sc</h4>
                             <h5>Komite Akreditasi Kesehatan Masyarakat</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		<div class="col-md-3">
                     <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                         <a class="img-box">
                             <img class="anima" src="{{ asset('lamptkes/images/windarmanto.jpg') }}" alt="" />
                         </a>
                         <div class="content-box">
                             <h4>Prof. Win Darmanto, M.SI., Ph.D</h4>
                             <h5>Komite Akreditasi Kesehatan Lain</h5>
                             <hr class="e" />
                         </div>
                     </div>
                 </div>
		</div>
         </div>
     </div>
@endsection
