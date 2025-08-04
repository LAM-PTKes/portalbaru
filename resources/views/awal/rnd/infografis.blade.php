@extends('awal.template.app')
@section('title', 'Infografis LAM-PTKes')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Infografis LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Infografis LAM-PTKes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <div class="section-empty section-item">
        <div class="container content">
             
             <div class="row">

                @foreach($infografis as $ifg)
                    <div class="col-md-4">
                        <div class="img-box adv-img adv-img-classic-box">
                            <a class="img-box" href="{{ route('dinfograf', $ifg->id ) }}">
                                <img alt="" src="{{ asset('infografis/'.$ifg->gambar) }}" style="width: 100%; height: auto;" >
                            </a>
                            <div class="caption">
                                <div class="caption-inner">
                                    <h2>{{ $ifg->judul }}</h2>
                                    <p class="big-text">
                                       View 
                                        @if(empty($ifg->views))
                                            0
                                        @else
                                            {{ $ifg->views }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <hr class="space m">
               <center>
                    {!! $infografis->render() !!}
               </center>
            </div>
    </div>
</div>

@endsection
