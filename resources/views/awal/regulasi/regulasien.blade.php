@extends('awal.template.appen')
@section('title', 'Regulation - IAAHEH')
@section('content')
    
    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Regulation IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Regulation IAAHEH</li>
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
                              @foreach($regulasis as  $regulasi =>$v)
                            <div class="grid-item col-md-12">
                                <div class="advs-box niche-box-blog">
                                    <div class="block-top">
                                        <div class="block-title">
                                            <h3> <a href="{{ route('dregulen', $v->id) }}">
                                                    {!! $v->judul !!}
                                                </a></h3>
                                            <div class="tag-row">
                                                <span>
                                                    <i class ="fa fa-calendar"></i>
                                                    <a href="{{ route('dregulen', $v->id) }}">{{ date('d-m-Y', strtotime($v->created_at)) }}</a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-bookmark"></i> 
                                                    <a href="{{ route('dregulen', $v->id) }}">
                                                        {{ str_replace('Regulasi', 'Regulation', $v->katberita->namakbrt) }} 
                                                        <b>{{ str_replace($rg, $grg, $v->kat_regulasi) }}</b>
                                                    </a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-pencil"></i> 
                                                    <a href="{{ route('dregulen', $v->id) }}">Admin</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <hr class="space m" />
                            </div>
                            @endforeach
                        </div>
                        <div class="list-nav">
                           {{--<ul class="pagination pagination-grid hide-first-last" data-page-items="3" data-pagination-anima="show-scale" data-options="scrollTop:true"></ul>--}}
                            {!! $regulasis->render() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 widget">
                   <!--  <hr class="space s" />
                    <div class="list-group list-blog">
                        <p class="list-group-item active">Kegiatan IAAHEH</p>
                        @foreach($agendas as $agenda)
                            <div class="list-group-item">
                                <div class="tag-row icon-row">
                                    <span>
                                        <i class="fa fa-calendar"></i>
                                        {{ date('d F Y', strtotime($agenda->created_at)) }}
                                    </span>
                                </div>
                                <a href="#">
                                    <h5>{{ $agenda->nagenda }}</h5>
                                </a>
                                <p>
                                    {!! str_limit($agenda->deskripsi, $limit = 100, $end = '...') !!}
                                </p>
                            </div>
                        @endforeach
                    </div> -->
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
                                        <a href="{{ route('dregulen', $pnm->id) }}">
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