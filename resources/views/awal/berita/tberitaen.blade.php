@extends('awal.template.appen')
@section('title', 'News - IAAHEH')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>News of IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">News IAAHEH</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
     <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="grid-list grid-layout grid-15">
                        <div class="grid-box row">
                        	@foreach($beritas as  $berita =>$v)
	                            <div class="grid-item col-md-6">
	                                <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
	                                    <div class="block-infos">
	                                        <div class="block-data">
	                                            <p class="bd-day">{{ date('d', strtotime($v->created_at)) }}</p>
	                                            <p class="bd-month">{{ date('F Y', strtotime($v->created_at)) }}</p>
	                                        </div>
	                                        <a class="block-comment" href="#">2
	                                        	<i class="fa fa-comment-o"></i>
	                                        </a>
	                                    </div>
	                                    <a class="img-box" href="{{ route('dberitaen', $v->id) }}">
	                                    	@if(!empty($v->file_gambar) || !file_exists('img/'.$v->file_gambar))
	                                    		<img class="anima" src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $v->file_gambar]) }}" width="250px" height="250px" alt="" />
	                                    	@else

	                                    		<img class="anima" src="{{ asset('img/kosong.png') }}" width="250px" height="250px" alt="" />
	                                    	@endif
	                                    </a>
	                                    <div class="advs-box-content">
	                                        <h2 class="text-m">
	                                        	<a href="{{ route('dberitaen', $v->id) }}">
	                                        		{!! str_limit($v->judul, $limit = 50, $end = '...') !!}
	                                        	</a>
	                                        </h2>
	                                        <div class="tag-row">
	                                            <span>
	                                            	<i class="fa fa-bookmark"></i>
	                                            	<a href="{{ route('dberitaen', $v->id) }}">
	                                            		{{ str_replace($cari, $ganti, $v->katberita->namakbrt) }}
	                                            	</a>
	                                            </span>
	                                            <span>
	                                            	<i class="fa fa-pencil"></i>
	                                            	<a href="{{ route('dberitaen', $v->id) }}">Admin</a>
	                                            </span>
			                                    <span>
			                                        <i class="fa fa-clock-o"></i>
			                                        {{ date('Y-m-d', strtotime($v->created_at)) }}
			                                    </span>
	                                        </div>
	                                        <p class="niche-box-content">
	                                            {!! str_limit($v->isi, $limit = 80, $end = '...') !!}
	                                        </p>
	                                    </div>
	                                </div>
	                            </div>
                            @endforeach
                        </div>
                        <div class="list-nav">
                            {!! $beritas->render() !!}
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
