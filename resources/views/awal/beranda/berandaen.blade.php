@extends('awal.template.appen')
@section('title', 'IAAHEH | Indonesian Accreditation Agency for Higher Education in Health')
@section('content')

     <div class="section-empty no-paddings">
        <div class="section-slider row-18 white">
            <div class="flexslider advanced-slider slider visible-dir-nav" data-options="animation:fade">
                <ul class="slides">
                    @foreach($headlines as $headline)
                        <li data-slider-anima="fade-left" data-time="1000">
                        <div class="section-slide">
                            <div class="bg-cover" style="background-image:url({{ route('secure.document.folder', ['folder' => 'img', 'filename' => $headline->file_gambar]) }})">
                            </div>
                            <div class="container">
                                <div class="container-middle">
                                    <div class="container-inner text-left">
                                        <div class="row">
                                            <div class="col-md-8 anima">

                                                <a style="color: white;" href="{{ route('dberitaen', $headline->id) }}">
                                                    <h1 class="text-l text-normal">{{ $headline->judul }}...&nbsp;(More Details)</h1>
                                                </a>
                                                <hr class="space s" />
                                            </div>
                                        </div>
                                        <hr class="space visible-sm" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="section-bg-color bg-color white">
        <div class="container content pad">
            <div class="row">
                <div class="col-md-2">
                    <div class="icon-box counter-box-icon">
                        <div class="icon-box-cell">
                            <i class="fa fa-group text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                            @foreach($obj as $k)
                                <a href="{{ route('padetailen') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k['JML_ASSESOR']}}" style="color: white;">
                                        {{ $k['JML_ASSESOR']}}
                                    </label>
                                    <p>Assessor Request</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="icon-box counter-box-icon">
                        <div class="icon-box-cell">
                            <i class="fa fa-bar-chart text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                            @foreach($obj1 as $k1)
                                <a href="{{ route('detailaken') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k1['JML_AK'] }}" style="color: white;">
                                        {{ $k1['JML_AK'] }}
                                    </label>
                                    <p>Desk Assessment</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="icon-box counter-box-icon">
                        <div class="icon-box-cell">
                            <i class="fa fa-tasks text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                            @foreach($obj2 as $k)
                                <a href="{{ route('detailalen') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k['JML_AL'] }}" style="color: white;">
                                        {{ $k['JML_AL'] }}
                                    </label>
                                    <p>Field Assessment</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="icon-box counter-box-icon">
                        <div class="icon-box-cell">
                            <i class="fa fa-laptop text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                            @foreach($obj3 as $k)
                                <a href="{{ route('detailpven') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k['JML_PROSES_VALIDASI'] }}" style="color: white;">
                                        {{ $k['JML_PROSES_VALIDASI'] }}
                                    </label>
                                    <p>Validation Process</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="icon-box counter-box-icon">
                        <div class="icon-box-cell">
                            <i class="fa fa-home text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                            @foreach($obj4 as $k)
                                <a href="{{ route('detailsven') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k['JML_SELESAI_VALIDASI'] }}" style="color: white;">
                                        {{ $k['JML_SELESAI_VALIDASI'] }}
                                    </label>
                                    <p>Validation Complete</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="icon-box counter-box-icon">
                        <div class="icon-box-cell">
                            <i class="fa fa-map-o text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                            @foreach($obj5 as $k)
                                <a href="{{ route('detailpmen') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k['JML_PROSES_MAJELIS'] }}" style="color: white;">
                                        {{ $k['JML_PROSES_MAJELIS'] }}
                                    </label>
                                    <p>Assembly Process</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="section-bg-color bg-color white">
            <div class="container content pad">
                  <div class="row">
                    <div class="col-md-2 col-sm-2 puk">
                    <p align="center"><b>Breaking News!</b></p>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <marquee direction="" onmouseover="this.stop();" style="background-color: #00552c;" onmouseout="this.start();">
                            @foreach($breaking as $break)
                                <i class="fa fa-bullhorn" aria-hidden="true"></i> &nbsp;&nbsp;
                                    <a style="color: white;" href="{{ route('dberitaen', $break->id) }}">
                                        {{ $break->judul }}
                                    </a>
                                &nbsp;&nbsp;
                            @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    <br>

      <div class="section-bg-color">
        <div class="container content">
          <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="collapse navbar-collapse">
                    <div class="peny">
                        <h3 class="penny">
                          <i class="fa fa-newspaper-o"></i>
                            <a href="#" class="rsswidget">About US</a>
                        </h3>
                    </div>
                </div>
            </div>

          <div class="col-md-4 col-sm-6">

              <div class="collapse navbar-collapse">

                        <div class="peny">
                    <h3 class="penny">
                      <i class="fa fa-bullhorn"></i>
                        <a href="#" class="rsswidget">Update Information</a>
                    </h3>
                </div>


            </div>
          </div>
          </div>
            <div class="row">

                @foreach($brts as $brt)
                    <div class="col-md-4 col-sm-6">
                        <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
                            <div class="block-infos">
                                <div class="block-data">
                                    <p class="bd-day">{{ date('d', strtotime($brt->created_at)) }}</p>
                                    <p class="bd-month">{{ date('F Y', strtotime($brt->created_at)) }}</p>
                                </div>
                            </div>
                                <a class="img-box fuck">
                                    <img class="anima"  src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $brt->file_gambar]) }}" alt="{{ $brt->judul }}" />
                                </a>

                            <div class="advs-box-content">
                                <h2>
                                    <a class="text-m" href="{{ route('dberitaen',$brt->id) }}">
                                    {{ $brt->judul }}
                                    </a>
                                </h2>
                                <div class="tag-row">
                                    <span>
                                        <i class="fa fa-bookmark"></i>
                                        <a href="#">{{ str_replace($cari, $ganti, $kbrt->namakbrt) }}</a>
                                    </span>
                                    <span>
                                        <i class="fa fa-pencil"></i>
                                        Admin
                                    </span>
                                    <span>
                                        <i class="fa fa-clock-o"></i>
                                        {{ date('d-m-Y', strtotime($brt->created_at)) }}
                                    </span>
                                </div>
                                {{-- <p class="niche-box-content"> --}}
                                    {{-- {!! str_limit($brt->isi, 85) !!} --}}
                                {{-- </p> --}}

                                    <a href="{{ route('dberitaen',$brt->id) }}">
                                        Read More...
                                    </a>
                            </div>
                        </div>

                    </div>
                @endforeach

                <div class="col-md-4 col-sm-12">
                    <hr class="space visible-sm" />
                    <div class="scroll-content scroll-mobile-disabled" data-height="405">
                        @foreach($pengumumans as $pengumuman)
                            <div class="advs-box advs-box-side-icon">
                                <div class="caption-box">
                                    <h2 class="text-m"><a href="{{ route('dberitaen', $pengumuman->id) }}">{{ $pengumuman->judul }}</a></h2>
                                    <span class="extra-content">{{ date('d F Y', strtotime($pengumuman->created_at)) }}</span>.
                                    <p>
                                        {!! str_limit($pengumuman->isi, $limit = 100, $end = '...') !!}
                                    </p>
                                </div>
                            </div>
                            <hr class="space m" />
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('tpengumumanen') }}">
                <i class="fa fa-eye"> <u>Other Announcement</u></i>
            </a>
        </div>
    </div>
    <a href="{{ route('tberitaen') }}">
        <i class="fa fa-eye"> <u>Other News</u></i>
    </a>
     <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                <div class="col-md-4">
                    <div class="title-base text-left">
                        <hr />
                        <h2>Testimonials</h2>
                        <p>Testimonials  of IAAHEH</p>
                    </div>
                    Following are some of the Testimonials from IAAHEH Stakeholder Association..

                </div>
                <div class="col-md-8">
                    <div class="flexslider slider nav-inner nav-right" data-options="controlNav:true,directionNav:false">
                        <ul class="slides">
                             @foreach($karyawans as $karyawan)
                            <li>
                                <div class="advs-box niche-box-testimonails-cloud">

                                        {!! $karyawan->deskripsi !!}

                                    <div class="name-box">
                                        <i class="fa text-l circle onlycover" style="background-image:url({{ route('secure.document.folder', ['folder' => 'img', 'filename' => $karyawan->nfile]) }})"></i>
                                        <h5 class="subtitle">{{ $karyawan->nama_lengkap }}<span class="subtxt">{{ $karyawan->jabatan }}</span></h5>
                                    </div>
                                </div>
                            </li>
                             @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-bg-color no-paddings-y">
        <div class="container content">
            <div class="row vertical-row">
                <div class="col-md-8 col-sm-6">
                    <hr class="space visible-sm" />
                    <div class="title-base text-left">
                        <hr />
                        <h2>Gallery</h2>
                        <p>Photos and Videos</p>
                    </div>
                    <hr class="space s">
                    <div class="grid-list gallery">
                        <div class="grid-box row" data-lightbox-anima="fade-left">
                            @foreach($photos as $photo)
                                <div class="grid-item col-md-3 col-sm-4">
                                    <a class="img-box i-center" href="{{ route('secure.document.folder', ['folder' => 'album/gallery', 'filename' => $photo->nama_file]) }}">
                                        <i class="fa fa-camera"></i>
                                        <img src="{{ route('secure.document.folder', ['folder' => 'album/gallery', 'filename' => $photo->nama_file]) }}" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr class="space m">
                    <a href="{{ route('galleryen') }}">
                        <button type="button" name="ok" class="anima-button btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                                See Other Photos
                        </button>
                    </a>
                    <span class="space"></span>
                    <a href="{{ route('tvideoen') }}">
                        <button type="button" name="ok" class="anima-button btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                                See Other Videos
                        </button>
                    </a>
                    <span class="space"></span>
                </div>
                @foreach($videos as $video)
                    <div class="col-md-4 col-sm-6 text-right" data-anima="fade-right">
                        <hr class="space">
                        {{-- <img src="{{ asset('lamptkes/images/avatar-3.jpg') }}" alt=""> --}}
                        <iframe width="260"  src="{{ $video->link }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                        </iframe>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <br>
        <div class="section-empty">
        <div class="container content">
            <div class="row">
                <div class="col-md-3">
                    <div class="title-base text-left">
                        <hr />
                        <h2>Founders of IAAHEH</h2>
                        <p>7 Health Professional Organizations and 7 Associations of Health Education Institution</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="flexslider carousel outer-navs png-boxed png-over text-center" data-options="numItems:5,minWidth:100,itemMargin:30,controlNav:false,directionNav:true">
                        <ul class="slides">
                            @foreach($ftr as $fot)
                                <li>
                                    <a class="img-box" href="{{ $fot->url }}" target="_BLANK">
                                        <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $fot->nfile]) }}" alt="LAM-PTKes">
                                    </a>
                                    <b>
                                        {{ $fot->nlink }}
                                    </b>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
