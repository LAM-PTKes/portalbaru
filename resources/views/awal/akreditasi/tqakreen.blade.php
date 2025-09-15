@extends('awal.template.appen')
@section('title', 'Flow & Stages of Accreditation - IAAHEH')
@section('content')
    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Flow & Stages of Accreditation IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Flow & Stages of Accreditation</li>
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
                                                    @foreach ($alu as $v)
                                                        @if ($v->id == $aktif->id)
                                                            <li class="active">
                                                            @else
                                                            <li>
                                                        @endif
                                                        <a href="#">
                                                            <b>
                                                                {{ $v->nqakre }}
                                                            </b>
                                                        </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                @foreach ($alu as $vl)
                                                    @if ($vl->id == $aktif->id)
                                                        <div class="panel active">
                                                        @else
                                                            <div class="panel">
                                                    @endif
                                                    {!! $vl->deskripsi !!}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
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
                            <i class="fa fa-newspaper-o"></i>
                            <a href="#" class="rsswidget">News IAAHEH</a>
                        </h3>
                    </div>
                    @foreach ($beritas as $berita)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="img-box circle">
                                        @if ($berita->file_gambar && Storage::disk('nfs_documents')->exists('img/' . $berita->file_gambar))
                                            <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $berita->file_gambar]) }}"
                                                alt="">
                                        @else
                                            <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => 'kosong.png']) }}"
                                                alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <a href="{{ route('dberitaen', $berita->id) }}">
                                        <h5>{{ $berita->judul }}</h5>
                                    </a>
                                    <div class="tag-row icon-row">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            {{ date('d F Y', strtotime($berita->created_at)) }}
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
                </br>
                </br>
                </br>
                <div class="list-group latest-post-list list-blog">
                    <div class="peny">
                        <h3 class="penny">
                            <i class="fa fa-list-alt"></i>
                            <a href="#" class="rsswidget">Activity IAAHEH</a>
                        </h3>
                    </div>
                    @foreach ($agendas as $agenda)
                        <div class="list-group-item">
                            <a href="{{ route('dagendaen', $agenda->id) }}">
                                <h5>{{ $agenda->nagenda }}</h5>
                            </a>
                            <div class="tag-row icon-row">
                                <span>
                                    <i class="fa fa-calendar"></i>
                                    {{ date('d F Y', strtotime($agenda->created_at)) }}
                                </span>
                            </div>
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
