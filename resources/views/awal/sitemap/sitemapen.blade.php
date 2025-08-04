@extends('awal.template.appen')
@section('title', 'Site Map IAAHEH')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Site Map IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Site Map</li>
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
                                                Site Map IAAHEH
                                            </h2>
                                            <div class="tag-row">
                                                <span><i class="fa fa-bookmark"></i> <a href="{{ route('tsitemapen')}}">Site Map</a></span>
                                                <span><i class="fa fa-pencil"></i>Admin</span>
                                            </div>
                                        </div>
                                    </div>

                                        <p class="excerpt">
                                            <p>
                                                <a href="{{ url('/en') }}" target="_blank">
                                                    <b>Home</b>
                                                </a>
                                            </p>
                                            <p>
                                                <b>About us</b>
                                            </p>
                                            <p>
                                                &nbsp;&nbsp;
                                                Profile
                                            </p>
                                            <p>&nbsp;&nbsp; Organization</p>
                                            <p>&nbsp;&nbsp; News</p>
                                            <p>&nbsp;&nbsp; Regulation</p>
                                            <p>&nbsp;&nbsp; Announcement</p>
                                            <p>&nbsp;&nbsp; Annual Archievement</p>
                                            <p>&nbsp;&nbsp; Assessment Team</p>
                                            <p>&nbsp;&nbsp; All Downloads</p>
                                            <p>&nbsp;&nbsp; Manual SIMAk</p>
                                            <p>&nbsp;&nbsp; Assessment Team Guideline</p>
                                            <p>&nbsp;&nbsp; FAQ</p>
                                            <p>&nbsp;&nbsp; Suggestion</p>
                                            <p>&nbsp;&nbsp; Sitemap</p>
                                            <p><b>About Accreditation</b></p>
                                            <p>&nbsp;&nbsp; Directory of Accreditation Results</p>
                                            <p>&nbsp;&nbsp; Accreditation Instruments</p>
                                            <p>&nbsp;&nbsp; Accreditation Process Study Program</p>
                                            <p>&nbsp;&nbsp; Flow &amp; Stages of the Accreditation Process</p>
                                            <p><b>Gallery</b></p>
                                            <p>&nbsp;&nbsp; Gallery Photo</p>
                                            <p>&nbsp;&nbsp; Gallery Video</p>
                                            <p><b>Contact us</b></p>
                                       </p>
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
