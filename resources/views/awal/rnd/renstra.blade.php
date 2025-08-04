@extends('awal.template.app')
@section('title', 'Detail Laporan Riset - LAM-PTKes')
@section('content')
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Renstra LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Renstra LAM-PTKest</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <div class="section-empty section-item">
        <div class="container content">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="grid-list one-row-list">
                    	<div class="grid-box row">
                            <div class="grid-item col-md-12">
                                <div class="advs-box niche-box-blog" style="display: inline-block;">
                                    @foreach($renstra as $v)
                                        {{-- <embed src="{{ asset('renstra/'. $v->nfile ) }}" width="850px" height="500px" type="application/pdf" > --}}


                                        {{ $v->judul }}
                                        <hr class="space m" />


                                        <embed src="{{ route('secure.document.folder', ['folder' => 'renstra', 'filename' => $v->nfile]) }}"  style="min-width: 1000px;  height: 500px;" type="application/pdf" >
                                        <hr class="space m" />
                                        {!! $v->deskripsi !!}

                                    @endforeach

                                <hr class="space m" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
