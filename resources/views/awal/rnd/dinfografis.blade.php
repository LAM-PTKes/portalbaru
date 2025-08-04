@extends('awal.template.app')
@section('title', 'Detail Infografis - LAM-PTKes')

@section('content')
    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Detail Infografis LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Detail Infografis LAM-PTKes</li>
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
                                    <h2>{{ $ifg->judul }}</h2>
                                    <div class="tag-row icon-row">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            <a>
                                                {{ date('d-m-Y', strtotime($ifg->created_at )) }}
                                            </a>
                                        </span>
                                        <span>
                                            <i class="fa fa-eye"></i>
                                            <a href="#">
                                                @if(empty($ifg->views))
                                                0
                                                @else
                                                {{ $ifg->views }}
                                                @endif
                                            </a>
                                        </span>
                                        <span><i class="fa fa-pencil"></i><a>admin</a></span>
                                    </div>
                                   <img class="anima" src="{{ asset('infografis/'.$ifg->gambar) }}" alt=""  />
                                    <br>
                                    <br>
                                    <p style="text-align: justify;">
                                        {!! $ifg->deskripsi !!}
                                    </p>
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
                                <a href="#" class="rsswidget">Infografis Lainnya</a>
                            </h3>
                        </div>
                        @foreach($infografis as $v)
                            <div class="list-group-item">
                                <div class="tag-row icon-row">
                                    <span>
                                        <i class="fa fa-calendar"></i>
                                        {{ date('d-m-Y', strtotime($v->created_at)) }}
                                    </span>
                                    <span>
                                        <i class="fa fa-eye" id="tempo"></i>
                                            @if(empty($v->views))
                                                0
                                            @else
                                                @if($ifg->id == $v->id)
                                                    {{ $ifg->views }}
                                                @else 
                                                    {{ $v->views }}
                                                @endif
                                            @endif
                                    </span>
                                </div>
                                <a href="{{ route('dinfograf', $v->id)}}">
                                    <h5>{{ $v->judul }}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                     <a href="{{ route('infograf') }}">
                        <i class="fa fa-eye"> <u>Infografis Lainnya</u></i>
                    </a>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection