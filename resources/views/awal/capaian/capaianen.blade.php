@extends('awal.template.appen')
@section('title', 'Annual Archievement IAAHEH')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Annual Archievement IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active">Annual Archievement</li>
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
                                <div id="general" class="title-base text-left">
                                    <h2>Annual Archievement</h2>
                                </div>
                                <div class="list-group accordion-list" data-time="1000" data-type='accordion'>
                                    @for($i = 2015; $i <= date('Y'); $i++)
                                        <div class="list-group-item">
                                            <a>  Year Achievements {{ $i }} </a>
                                            <div class="panel">
                                                <div class="inner">
                                                    <ul class="ul-dots">
                                                        @foreach($capaians as $v)
                                                            @if(date('Y', strtotime($v->tahun)) == $i)
                                                                <p>
                                                                    <li>
                                                                        <a href="{{ route('secure.document.folder', ['folder' => 'unduhan', 'filename' => $v->nama_file]) }}" target="blank">
                                                                            <button type="button" class="anima-button btn-sm btn">
                                                                                <i class="fa fa-download"></i>
                                                                                    {{ str_replace('Capaian', 'achievements', $v->judul) }}
                                                                                    {{  date('F Y', strtotime($v->tahun)) }}
                                                                            </button>
                                                                        </a>
                                                                    </li>
                                                                </p>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
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
                                <a href="#" class="rsswidget">News IAAHEH</a>
                            </h3>
                        </div>
                        @foreach($beritas as $berita)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="img-box circle">
                                            @if(!empty($berita->file_gambar) || file_exists('img/'. $berita->file_gambar))
                                               <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $berita->file_gambar]) }}" alt="IAAHEH">
                                            @else
                                                <img src="{{ asset('img/kosong.png') }}" alt="IAAHEH">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('tberitaen') }}">
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
                    <a href="{{ route('tberitaen') }}">
                        <i class="fa fa-eye"> <u> Other News</u></i>
                    </a>
                    <br>
                    <br>
                    <br>
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
                                        {{ date('d F Y', strtotime($agenda->created_at) )}}
                                    </span>
                                </div>
                                <a href="{{ route('tagendaen') }}">
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
                </div>
            </div>
        </div>
    </div>

@endsection
