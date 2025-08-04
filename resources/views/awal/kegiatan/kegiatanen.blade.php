@extends('awal.template.appen')
@section('title', 'Activity - IAAHEH')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Activity IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Activity</li>
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
                            @foreach($agendas as $agenda)
                            <div class="grid-item col-md-12">
                                <div class="advs-box niche-box-blog">
                                    <div class="block-top">
                                        <div class="block-infos">
                                            <div class="block-data">
                                                <p class="bd-day">{{ date('d', strtotime($agenda->created_at)) }} </p>
                                                <p class="bd-month"><b>{{ date('M', strtotime($agenda->created_at)) }}</b></p>
                                                <p class="bd-month">{{ date('Y', strtotime($agenda->created_at)) }}</p>
                                            </div>
                                        </div>
                                        <div class="block-title">
                                            <h3><a href="{{ route('dagendaen', $agenda->id)}}"> {{ $agenda->nagenda }}</a></h3>
                                            <div class="tag-row"><span> <i class="fa fa-map-marker"></i>  <a href="#">{{ $agenda->lokasi }}</a></span>
                                                <span>
                                                    <i class="fa fa-pencil"></i>
                                                    <a href="#">Admin</a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ date('d-m-Y', strtotime($agenda->created_at)) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- 
                                    <p class="excerpt">
                                        {!! str_limit($agenda->deskripsi, $limit = 300, $end = '...') !!}
                                    </p> -->
                                </div>
                                <hr class="space m" />
                            </div>
                            @endforeach
                        </div>
                        <div class="list-nav">
                            {{ $agendas->render() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 widget">
                    <div class="list-group latest-post-list list-blog">
			            <div class="peny">
                            <h3 class="penny">
                              <i class="fa fa-newspaper-o"></i>
                                <a href="#" class="rsswidget">Most Popular News</a>
                            </h3>
                        </div> 
                        @foreach($populer as $ppl)
                            <div class="list-group-item">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <a href="{{ route('dberitaen', $ppl->id) }}">
	                                        <h5>{{ str_limit($ppl->judul, $limit = 50, $end = '...') }}</h5>
	                                    </a>
	                                    <div class="tag-row icon-row">
	                                    	<span>
	                                    		<i class="fa fa-calendar"></i>
	                                    		{{ date('d F Y', strtotime($ppl->created_at)) }}
	                                    	</span>
                                            <span>
                                                <i class="fa fa-eye"></i>
                                                {{ $ppl->populer }}
                                            </span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('tberitaen') }}">
                        <i class="fa fa-eye"> <u>Other News</u></i>
                    </a>
                    <br><br><br>
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
	                                    <a href="{{ route('dpengumen', $pnm->id) }}">
	                                        <h5>
                                                {{ str_limit($pnm->judul, $limit = 50, $end = '...') }}
                                            </h5>
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