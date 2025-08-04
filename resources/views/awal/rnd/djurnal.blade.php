@extends('awal.template.app')
@section('title', 'Detail Jurnal - LAM-PTKes')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Detail Jurnal</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Detail Jurnal</li>
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

                                   <embed src="{{ route('secure.document.folder', ['folder' => 'jurnal', 'filename' => $jnl->file_jurnal]) }}" width="850px" height="500px" type="application/pdf" >

                                </div>
                                <hr class="space m" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 widget">
                  <div class="list-group latest-post-list list-blog">
                        <div class="peny">
                            <h3 class="penny">
                                <i class="fa fa-list-alt"></i>
                                <a href="#" class="rsswidget">Daftar Jurnal Lainnya</a>
                            </h3>
                        </div>
                        @foreach($junal as $v)
                        	<div class="list-group-item">
	                            <div class="tag-row icon-row">
                                    <span>
                                        <i class="fa fa-calendar"></i>
                                        {{ date('d-m-Y', strtotime($v->created_at)) }}
                                    </span>
                                    <span>
                                        <i class="fa fa-eye"></i>
                                        <b id="ditempo">
                                            @if(empty($v->views))
                                                0
                                            @else
                                                @if($jnl->id == $v->id)
                                                    {{ $jnl->views }}
                                                @else
                                                    {{ $v->views }}
                                                @endif
                                            @endif
                                        </b>
                                    </span>
	                            </div>
	                            <a href="{{ route('djurnal', $v->id)}}">
	                                <h5>{{ $v->judul_jurnal }}</h5>
	                            </a>
	                        </div>
                        @endforeach
                    </div>
                     <a href="{{ route('tjurnal') }}">
                        <i class="fa fa-eye"> <u>Daftar Jurnal Lainnya</u></i>
                    </a>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection
