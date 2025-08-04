@extends('awal.template.app')
@section('title', 'Organisasi - LAM-PTKes')
@section('content')
<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Organisasi LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Organisasi</li>
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
                    <div class="tab-box" id="tab-classic" data-tab-anima="fade-right">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#">
                                    <b>
                                        @foreach($torgans as $v => $organ)
                                            {{ $organ->norgan }}
                                        @endforeach
                                    </b>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <b>
                                        @foreach($org as $v => $organ)
                                            {{ $organ->norgan }}
                                        @endforeach
                                    </b>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <b>
                                        @foreach($org1 as $v => $organ)
                                            {{ $organ->norgan }}
                                        @endforeach
                                    </b>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <b>
                                        @foreach($org2 as $v => $organ)
                                            {{ $organ->norgan }}
                                        @endforeach
                                    </b>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#">
                                    <b>
                                        @foreach($org3 as $v => $organ)
                                            {{ $organ->norgan }}
                                        @endforeach
                                    </b>
                                </a>
                            </li> -->
                            <li>
                                <a href="#">
                                    <b>
                                        @foreach($org4 as $v => $organ)
                                            {{ $organ->norgan }}
                                        @endforeach
                                    </b>
                                </a>
                            </li>
                        </ul>
                        <div class="panel active">
                            @foreach($torgans as $v => $organ)
                                {!! $organ->deskripsi !!}
                            @endforeach
                        </div>
                        <div class="panel">
                            @foreach($org as $v => $organ)
                                {!! $organ->deskripsi !!}
                            @endforeach
                        </div>
                         <div class="panel">
                            @foreach($org1 as $v => $organ)
                                {!! $organ->deskripsi !!}
                            @endforeach
                        </div>
                         <div class="panel">
                            @foreach($org2 as $v => $organ)
                                {!! $organ->deskripsi !!}
                            @endforeach
                        </div>
                         <!-- <div class="panel">
                            @foreach($org3 as $v => $organ)
                                {!! $organ->deskripsi !!}
                            @endforeach
                        </div> -->
                        <div class="panel">
                            @foreach($org4 as $v => $organ)
                                {!! $organ->deskripsi !!}
                            @endforeach
                        </div>
                    </div>
                                </div>
                            </div>
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
                      <i class="fa fa-newspaper-o"></i>
                        <a href="#" class="rsswidget">Seputar LAM-PTKes</a>
                    </h3>
                </div>
               @foreach($beritas as $berita)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="img-box circle">
                                            @if(file_exists('img/'.$berita->file_gambar))
                                                <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $berita->file_gambar]) }}" alt="">
                                            @else
                                                <img src="{{ asset('img/kosong.png') }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('dberita', $berita->id) }}">
                                            <h5>{{ $berita->judul }}</h5>
                                        </a>
                                        <div class="tag-row icon-row">
                                            <span>
                                                <i class="fa fa-calendar"></i>
                                                {{ date('d F Y', strtotime($berita->created_at))}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                               <a href="{{ route('tberita') }}">
                            <i class="fa fa-eye"> <u> Seputar Berita Lainnya</u></i>

                        </a>
                    <br>
                    <br>
                    <br>
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
                                        {{ date('d F Y', strtotime($agenda->created_at) )}}
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
                        <i class="fa fa-eye"> <u>Kegiatan Lainnya</u></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
