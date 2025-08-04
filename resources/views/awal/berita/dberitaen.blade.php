@extends('awal.template.appen')
@section('title', 'Details News - IAAHEH')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Details {{ str_replace($cari, $ganti, $new->katberita->namakbrt) }}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">
                            Detail 
                            {{ str_replace($cari, $ganti, $new->katberita->namakbrt) }}
                        </li>
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
	                                <div class="advs-box niche-box-blog">
	                                    <div class="block-top">
	                                        <div class="block-title">
	                                            <h2>{{ $new->judul }}</h2>
	                                            <div class="tag-row">
	                                                <span>
                                                        <i class="fa fa-bookmark"></i> 
                                                        <a href="#">
                                                            {{ str_replace($cari, $ganti, $new->katberita->namakbrt) }}
                                                            @if($new->katberita->namakbrt == 'Regulasi')
                                                                <b>{{ str_replace($rg, $grg, $new->kat_regulasi) }}</b>
                                                            @endif
                                                        </a>
                                                    </span>
	                                                <span><i class="fa fa-pencil"></i><a>Admin</a></span>
                                                    <span>
                                                        <i class="fa fa-clock-o"></i>
                                                        {{ date('Y-m-d', strtotime($new->created_at)) }}
                                                    </span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    {{-- <p class="excerpt"> --}}
                                    		{!! $new->isi !!}
	                                    {{-- </p> --}}
	                                </div>
	                                <hr class="space m" />
	                            </div>
	                        </div>
	                        
                        <div class="list-nav">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 widget">
                  <div class="list-group latest-post-list list-blog">
                       <div class="peny">
                    <h3 class="penny">
                      <i class="fa fa-list-alt"></i>
                        <a href="#" class="rsswidget">Activity IAAHEH</a>
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
	                            <a href="{{ route('dagendaen', $agenda->id)}}">
	                                <h5>{{ $agenda->nagenda }}</h5>
	                            </a>
	                            <p>
	                                {!! str_limit($agenda->deskripsi, $limit = 100, $end = '...') !!}
	                            </p>
	                        </div>
                        @endforeach
                    </div>
                     <a href="{{ route('tagendaen') }}">

                            <i class="fa fa-eye"> <u>Other Activity</u></i>
                    </a>
                    <br>
                    <br>
                    <br>
                    <div class="list-group latest-post-list list-blog">
                              <div class="peny">
                    <h3 class="penny">
                      <i class="fa fa-bullhorn"></i>
                        <a href="#" class="rsswidget">Announcement IAAHEH</a>
                    </h3>
                </div> 
                        @foreach($pengumumans as $pnm)
                        	<div class="list-group-item">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <a href="{{ route('dberitaen', $pnm->id) }}">
	                                        <h5>{{ str_limit($pnm->judul, $limit = 50, $end = '...') }}</h5>
	                                    </a>
	                                    <div class="tag-row icon-row">
	                                    	<span>
	                                    		<i class="fa fa-calendar"></i>
	                                    		{{ date('d F Y', strtotime($pnm->created_at)) }}
	                                    	</span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        @endforeach
                    </div>
                     <a href="{{ route('tpengumumanen') }}">
                            <i class="fa fa-eye"> <u>Other Announcement</u></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection