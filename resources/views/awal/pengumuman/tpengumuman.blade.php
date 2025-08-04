@extends('awal.template.app')
@section('title', 'Pengumuman - LAM-PTKes')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>PENGUMUMAN LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Pengumuman LAM-PTKes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
     <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="grid-list one-row-list">
                        <div class="grid-box row">
                            @foreach($pengumumans as  $pengumuman =>$v)
                            <div class="grid-item col-md-12">
                                <div class="advs-box niche-box-blog">
                                    <div class="block-top">
                                        <div class="block-infos">
                                            <div class="block-data">
                                                <p class="bd-day">{{ date('d', strtotime($v->created_at)) }} </p>
                                                <p class="bd-month">{{ date('M', strtotime($v->created_at)) }}</p>
                                                <p class="bd-month">{{ date('Y', strtotime($v->created_at)) }}</p>
                                            </div>
                                        </div>
                                        <div class="block-title">
                                            <h3><a href="{{ route('dpengum', $v->id) }}"> {!! $v->judul !!}</a></h3>
                                            <div class="tag-row">
                                                <span><i class="fa fa-bookmark"></i> <a href="{{ route('dpengum', $v->id) }}">{{ $v->katberita->namakbrt }}</a></span>
                                                <span>
                                                    <i class="fa fa-pencil"></i>
                                                    <a href="{{ route('dpengum', $v->id) }}">
                                                        Admin
                                                    </a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ date('d-m-Y', strtotime($v->created_at)) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- 
                                    <p class="excerpt">
                                        {!! str_limit($v->isi, $limit = 200, $end = '...') !!}
                                    </p> -->
                                </div>
                                <hr class="space m" />
                            </div>
                            @endforeach
                        </div>
                        <div class="list-nav">
                          {!! $pengumumans->render() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 widget">
                    <div class="list-group latest-post-list list-blog">
                       <div class="peny">
                            <h3 class="penny">
                              <i class="fa fa-list-alt"></i>
                                <a href="#" class="rsswidget">Kegiatan LAM-PTKes</a>
                            </h3>
                        </div>
                        @foreach($agendas as $agenda)
                        	<div class="list-group-item">
	                            <div class="tag-row icon-row">
	                            	<span>
	                            		<i class="fa fa-calendar"></i>
	                            		{{ date('d F Y', strtotime($agenda->created_at)) }}
	                            	</span>
	                            </div>
	                            <a href="{{ route('dagenda', $agenda->id) }}">
	                                <h5>{{ $agenda->nagenda }}</h5>
	                            </a>
	                            <p>
	                                {!! str_limit($agenda->deskripsi, $limit = 100, $end = '...') !!}
	                            </p>
	                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('tagenda') }}">
                        <i class="fa fa-eye"> 
                            <u>Kegiatan Lainnya</u>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection