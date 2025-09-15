@extends('awal.template.app')
@section('title', 'Berita - LAM-PTKes')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Seputar LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Berita LAM-PTKes</li>
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
                            @foreach ($beritas as $berita => $v)
                                <div class="grid-item col-md-6">
                                    <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse"
                                        data-anima="scale-rotate" data-trigger="hover">
                                        <div class="block-infos">
                                            <div class="block-data">
                                                <p class="bd-day">{{ date('d', strtotime($v->created_at)) }}</p>
                                                <p class="bd-month">{{ date('F Y', strtotime($v->created_at)) }}</p>
                                            </div>
                                            <a class="block-comment" href="#">2
                                                <i class="fa fa-comment-o"></i>
                                            </a>
                                        </div>
                                        <a class="img-box" href="{{ route('dberita', $v->id) }}">
                                            @if ($v->file_gambar && Storage::disk('nfs_documents')->exists('img/' . $v->file_gambar))
                                                <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $v->file_gambar]) }}"
                                                    alt="" width="250px" height="250px">
                                            @else
                                                <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => 'kosong.png']) }}"
                                                    alt="" width="250px" height="250px">
                                            @endif
                                        </a>
                                        <div class="advs-box-content">
                                            <h2 class="text-m">
                                                <a href="{{ route('dberita', $v->id) }}">
                                                    {!! str_limit($v->judul, $limit = 50, $end = '...') !!}
                                                </a>
                                            </h2>
                                            <div class="tag-row">
                                                <span>
                                                    <i class="fa fa-bookmark"></i>
                                                    <a
                                                        href="{{ route('dberita', $v->id) }}">{{ $v->katberita->namakbrt }}</a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-pencil"></i>
                                                    <a href="{{ route('dberita', $v->id) }}">Admin</a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ date('d-m-Y', strtotime($v->created_at)) }}
                                                </span>
                                            </div>
                                            <p class="niche-box-content">
                                                {{-- {!! str_limit($v->isi, $limit = 80, $end = '...') !!} --}}
                                                <a href="{{ route('dberita', $v->id) }}">
                                                    <u style='color:blue; font-size: 14px;'>Selengkapnya</u>...
                                                </a>
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
                                <a href="#" class="rsswidget">Kegiatan LAM-PTKes</a>
                            </h3>
                        </div>
                        @foreach ($agendas as $agenda)
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

                        <i class="fa fa-eye"> <u>Kegiatan Lainnya</u></i>
                    </a>
                    <br>
                    <br>
                    <br>
                    <div class="list-group latest-post-list list-blog">
                        <div class="peny">
                            <h3 class="penny">
                                <i class="fa fa-bullhorn"></i>
                                <a href="#" class="rsswidget">Pengumuman LAM-PTKes</a>
                            </h3>
                        </div>
                        @foreach ($pengumumans as $pnm)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ route('dberita', $pnm->id) }}">
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

                    <a href="{{ route('tpengumuman') }}">
                        <i class="fa fa-eye"> <u>Pengumuman Lainnya</u></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection
