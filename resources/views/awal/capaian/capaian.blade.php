@extends('awal.template.app')
@section('title', 'Capaian Tahunan LAMPT-Kes')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>CAPAIAN TAHUNAN LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Capaian Tahunan</li>
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
                                    <h2>Capaian Tahunan LAMPT-Kes</h2>
                                </div>
                                <div class="list-group accordion-list" data-time="1000" data-type='accordion'>
                                    @for($i = 2015; $i <= date('Y'); $i++)
                                        <div class="list-group-item">
                                            <a>  Capaian Tahun {{ $i }} </a>
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
                                                                                    {{ $v->judul }}
                                                                                    {{ str_replace($bulan, $ganti, date('F Y', strtotime($v->tahun))) }}
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
                                <a href="#" class="rsswidget">Seputar LAM-PTKes</a>
                            </h3>
                        </div>
                        @foreach($beritas as $berita)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="img-box circle">
                                            @if(!empty($berita->file_gambar) || file_exists('img/'. $berita->file_gambar))
                                               <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $berita->file_gambar]) }}" alt="lam-ptkes">
                                            @else
                                                <img src="{{ asset('img/kosong.png') }}" alt="lam-ptkes">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('tberita') }}">
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
                                <a href="{{ route('tagenda') }}">
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
