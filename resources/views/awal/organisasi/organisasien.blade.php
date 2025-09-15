@extends('awal.template.appen')
@section('title', 'Organization - IAAHEH')
@section('content')

    @php
        use Illuminate\Support\Facades\Storage;
    @endphp

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Organization IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Organization</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="section-empty section-item">
        <div class="container content">
            <div class="row">
                <!-- Organization Deskripsi -->
                <div class="col-md-9 col-sm-12">
                    <div class="grid-list one-row-list">
                        <div class="grid-box row">
                            <div class="grid-item col-md-12">
                                <div class="advs-box niche-box-blog">
                                    <div class="block-top">
                                        <div class="block-title">
                                            <div class="tab-box" id="tab-classic" data-tab-anima="fade-right">
                                                <ul class="nav nav-tabs">
                                                    @foreach ($organs as $organ)
                                                        <li class="panel {{ $orgn->id == $organ->id ? 'active' : '' }}">
                                                            <a href="#">
                                                                <b>{!! $organ->norgan !!}</b>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                @foreach ($organs as $v)
                                                    <div class="panel {{ $orgn->id == $v->id ? 'active' : '' }}">
                                                        {!! $v->deskripsi !!}
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

                <!-- Sidebar News & Agenda -->
                <div class="col-md-3 col-sm-12 widget">
                    <!-- News -->
                    <div class="list-group latest-post-list list-blog">
                        <div class="peny">
                            <h3 class="penny">
                                <i class="fa fa-newspaper-o"></i>
                                <a href="#" class="rsswidget">News of IAAHEH</a>
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
                        <i class="fa fa-eye"> <u>Other News</u></i>
                    </a>

                    <br><br><br>

                    <!-- Agenda -->
                    <div class="list-group latest-post-list list-blog">
                        <div class="peny">
                            <h3 class="penny">
                                <i class="fa fa-list-alt"></i>
                                <a href="#" class="rsswidget">Activity IAAHEH</a>
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
                                <a href="{{ route('dagendaen', $agenda->id) }}">
                                    <h5>{{ $agenda->nagenda }}</h5>
                                </a>
                                <p>
                                    {!! \Illuminate\Support\Str::limit($agenda->deskripsi, 100, '...') !!}
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
