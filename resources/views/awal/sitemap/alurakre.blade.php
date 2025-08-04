@extends('awal.template.appen')
@section('title', 'Flow of Accreditation')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Flow of Accreditation</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Flow of Accreditation</li>
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
                                            <h2>
                                                Flow of Accreditation Process in IAAHEH
                                            </h2>
                                            <div class="tag-row">
                                                <span><i class="fa fa-bookmark"></i> <a href="{{ route('tsitemapen')}}">Flow of Accreditation</a></span>
                                                <span><i class="fa fa-pencil"></i>Admin</span>
                                            </div>
                                        </div>
                                    </div>

                                       @foreach($alur as $alr)
                                            {!! $alr->isi_profil !!}
                                       @endforeach
                                </div>
                                {{-- <hr class="space m" /> --}}
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
                        @foreach($beritas as $berita)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="img-box circle">
                                            @if(file_exists('img/'. $berita->file_gambar))
                                               <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $berita->file_gambar]) }}" alt="lamptkes">
                                            @else
                                                <img class="anima" src="{{ asset('img/kosong.png') }}" width="250px" height="250px" alt="" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('dberitaen', $berita->id ) }}">
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
                                <a href="{{ route('dagendaen', $agenda->id ) }}">
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
