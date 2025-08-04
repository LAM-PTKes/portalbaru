@extends('awal.template.app')
@section('title', 'LAM-PTKes | Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan Indonesia')
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
                                      <hr class="space m visible-sm" />
                                      <div class="row">
                                          <div class="col-md-6 anima">
                                              <h1 class="text-l text-normal text-m-xs"><a href="{{ route('dberita', $headline->id) }}">{{ $headline->judul }}</a></h1>
                                              <hr class="space s" />
                                              <a href="{{ route('dberita', $headline->id) }}" class="btn btn-lg btn-border">Selengkapnya</a>
                                          </div>
                                          <div class="col-md-6">
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
                <div class="col-md-2 col-sm-2 puk">


                    <p align="center"><b>Breaking News!</b></p>
                </div>
                <div class="col-md-10 col-sm-12">
                    <marquee direction="" onmouseover="this.stop();" style="background-color: #00552c;"
                        onmouseout="this.start();">
                        @foreach ($breaking as $break)
                            <i class="fa fa-bullhorn" aria-hidden="true"></i> &nbsp;&nbsp;
                            <a style="color: white;" href="{{ route('dberita', $break->id) }}">
                                {{ $break->judul }}
                            </a>
                            &nbsp;&nbsp;
                        @endforeach
                    </marquee>

                </div>

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
                            @foreach ($obj as $k)
                                <a href="{{ route('padetail') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k['JML_ASSESOR'] }}"
                                        style="color: white;">
                                        {{ $k['JML_ASSESOR'] }}
                                    </label>
                                    <p>Permintaan Assesor</p>
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
                            @foreach ($obj1 as $k1)
                                <a href="{{ route('detailak') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k1['JML_AK'] }}"
                                        style="color: white;">
                                        {{ $k1['JML_AK'] }}
                                    </label>
                                    <p>Assesmen Kecukupan</p>
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
                            @foreach ($obj2 as $k)
                                <a href="{{ route('detailal') }}" title="">
                                    <label class="counter text-l" data-speed="5000" data-to="{{ $k['JML_AL'] }}"
                                        style="color: white;">
                                        {{ $k['JML_AL'] }}
                                    </label>
                                    <p>Assesmen Lapangan</p>
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
                            @foreach ($obj3 as $k)
                                <a href="{{ route('detailpv') }}" title="">
                                    <label class="counter text-l" data-speed="5000"
                                        data-to="{{ $k['JML_PROSES_VALIDASI'] }}" style="color: white;">
                                        {{ $k['JML_PROSES_VALIDASI'] }}
                                    </label>
                                    <p>Proses Validasi</p>
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
                            @foreach ($obj4 as $k)
                                <a href="{{ route('detailsv') }}" title="">
                                    <label class="counter text-l" data-speed="5000"
                                        data-to="{{ $k['JML_SELESAI_VALIDASI'] }}" style="color: white;">
                                        {{ $k['JML_SELESAI_VALIDASI'] }}
                                    </label>
                                    <p>Selesai Validasi</p>
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
                            @foreach ($obj5 as $k)
                                <a href="{{ route('detailpm') }}" title="">
                                    <label class="counter text-l" data-speed="5000"
                                        data-to="{{ $k['JML_PROSES_MAJELIS'] }}" style="color: white;">
                                        {{ $k['JML_PROSES_MAJELIS'] }}
                                    </label>
                                    <p>Proses Majelis</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="section-bg-color">
        <div class="container content">
            <div class="row vertical-row">
                <div class="col-md-8 opacity-8">
                    <h2>Kunjungi Situs Akreditasi Internasional Kami.</h2>
                    <p class="no-margins">Temukan informasi lengkap tentang akreditasi internasional dan standar kualitas global kami.</p>
                </div>
                <div class="col-md-4">
                    <a href="https://iaaheh.org" target="_blank" class="btn btn-lg nav-justified">Akreditasi Internasional</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-base text-left">
                        <hr />
                        <h2>Tautan Terkait Layanan LAM-PTKes</h2>
                        <p>Layanan Tautan</p>
                    </div>
                    <div class="flexslider carousel outer-navs no-navs"
                        data-options="minWidth:200,itemMargin:30,numItems:4,controlNav:false">

                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides"
                                style="width: 1000%; transition-duration: 0s; transform: translate3d(-292px, 0px, 0px);">
                                <li style="padding-right: 30px; width: 292.5px; float: left; display: block;">
                                    <div class="advs-box advs-box-top-icon boxed-inverse"
                                        style="background: none; border-style: solid !important; border-width: 1px; border-color: #dcdcdc;"
                                        data-anima="rotate-20" data-trigger="hover">
                                        <a href="https://akreditasi.lamptkes.org"><i
                                                class="fa fa-television icon circle anima"></i></a>
                                        <h3><a href="https://akreditasi.lamptkes.org">SIMAk</a></h3>
                                        <p>
                                            <a href="https://akreditasi.lamptkes.org">Sistem Informasi Manajemen Akreditasi
                                                Online </a>

                                        </p>
                                    </div>
                                </li>
                                <li style="padding-right: 30px; width: 292.5px; float: left; display: block;">
                                    <div class="advs-box advs-box-top-icon boxed-inverse"
                                        style="background: none; border-style: solid !important; border-width: 1px; border-color: #dcdcdc;"
                                        data-anima="rotate-20" data-trigger="hover">
                                        <a href="http://simpel.lamptkes.org"> <i
                                                class="fa fa-universal-access icon circle anima" aid="0.3865277684740438"
                                                style="transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;"></i></a>
                                        <h3><a href="http://simpel.lamptkes.org">SIMPel</a></h3>
                                        <p>

                                            <a href="http://simpel.lamptkes.org">Sistem Informasi Manajemen Pelatihan Tim
                                                Penilai</a>
                                        </p>
                                    </div>
                                </li>
                                <li style="padding-right: 30px; width: 292.5px; float: left; display: block;">
                                    <div class="advs-box advs-box-top-icon boxed-inverse"
                                        style="background: none; border-style: solid !important; border-width: 1px; border-color: #dcdcdc;"
                                        data-anima="rotate-20" data-trigger="hover">
                                        <a href="https://skprodibaru.lamptkes.org/"><i
                                                class="fa fa-pencil-square-o icon circle anima" aid="0.15146185973674986"
                                                style="transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;"></i></a>
                                        <h3><a href="https://skprodibaru.lamptkes.org/">SK Prodi Baru</a> </h3>
                                        <p>
                                            <a href="https://skprodibaru.lamptkes.org/">SK Akreditasi Peringkat Baik
                                                Program Studi Baru</a>
                                        </p>
                                    </div>
                                </li>
                                <li style="padding-right: 30px; width: 292.5px; float: left; display: block;">
                                    <div class="advs-box advs-box-top-icon boxed-inverse"
                                        style="background: none; border-style: solid !important; border-width: 1px; border-color: #dcdcdc;"
                                        data-anima="rotate-20" data-trigger="hover">
                                        <a href="https://alihbentuk.lamptkes.org/"><i
                                                class="fa fa-share-alt-square icon circle anima" aid="0.7088953046493438"
                                                style="transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;"></i></a>
                                        <h3> <a href="https://alihbentuk.lamptkes.org/">Alih Bentuk</a> </h3>
                                        <p>

                                            <a href="https://alihbentuk.lamptkes.org/">Pengajuan Alih Bentuk/Perubahan Nama
                                                Perguruan Tinggi</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <ul class="flex-direction-nav">
                            <li class="flex-nav-prev"><a class="flex-prev" href="#"></a></li>
                            <li class="flex-nav-next"><a class="flex-next" href="#"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="section-bg-color">
            <div class="container content">
              <div class="col-md-12">
                  <div class="title-base text-left">
                      <hr />
                      <h2>Seputar LAM-PTKes</h2>
                      <p>Berita Terkini</p>
                  </div>
                <div class="row">
                  @foreach ($brts as $brt)
                    <div class="col-md-4 col-sm-6">
                        <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
                            <div class="block-infos">
                                <div class="block-data">
                                  <p class="bd-day">{{ date('d', strtotime($brt->created_at)) }}</p>
                                  <p class="bd-month">{{ date('F Y', strtotime($brt->created_at)) }}</p>
                                </div>
                            </div>
                            <a class="img-box"><img class="anima" src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $brt->file_gambar]) }}" alt="{{ $brt->judul }}" /></a>
                            <div class="advs-box-content">
                                <h2><a class="text-m" href="{{ route('dberita', $brt->id) }}">{{ $brt->judul }}</a></h2>
                                <div class="tag-row">
                                    <span><i class="fa fa-bookmark"></i> <a href="#">{{ $kbrt->namakbrt }}</a></span>
                                    <span><i class="fa fa-pencil"></i>Admin</span>
                                </div>
                                <p class="niche-box-content">
                                  {{-- <p class="niche-box-content"> --}}
                                   {!! str_limit($brt->isi, 85) !!}
                                  <a href="{{ route('dberita', $brt->id) }}">
                                      Lihat Selengkapnya...
                                  </a>
                                  {{-- </p> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-4 col-sm-12">
                    <hr class="space visible-sm" />
                    <div class="scroll-content scroll-mobile-disabled" data-height="405">
                      @foreach ($artis as $side)
                        <div class="advs-box advs-box-side-icon">
                            <div class="caption-box">
                                <h2 class="text-m"><a href="{{ route('dberita', $side->id) }}">{{ $side->judul }}</a></h2>
                                <span class="extra-content">{{ date('d F Y', strtotime($side->created_at)) }}</span>
                                <p>
                                  {!! str_limit($side->isi, 120) !!}
                                  <a href="{{ route('dberita', $side->id) }}"></a>
                                </p>
                            </div>
                        </div>
                        <hr class="space m" />
                        @endforeach
                    </div>
                    <hr class="space m" />
                    <a href="{{ route('tberita') }}" class="btn btn-lg">Berita Lainnya</a>
                </div>
            </div>
          </div>
          </div>
        </div>
    <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                <div class="col-md-4">
                    <div class="title-base text-left">
                        <hr />
                        <h2>Testimoni Kami</h2>
                        <p>Tentang Testimoni LAM-PTKes</p>
                    </div>
                    Berikut adalah beberapa testimoni yang berasal dari stakeholder Perkumpulan LAM-PTKes.

                </div>
                <div class="col-md-8">
                    <div class="flexslider slider nav-inner nav-right" data-options="controlNav:true,directionNav:false">
                        <ul class="slides">
                            @foreach ($karyawans as $karyawan)
                                <li>
                                    <div class="advs-box niche-box-testimonails-cloud">

                                        {!! $karyawan->deskripsi !!}

                                        <div class="name-box">
                                            <i class="fa text-l circle onlycover"
                                                style="background-image:url({{ route('secure.document.folder', ['folder' => 'img', 'filename' => $karyawan->nfile]) }})"></i>
                                            <h5 class="subtitle">{{ $karyawan->nama_lengkap }}<span
                                                    class="subtxt">{{ $karyawan->jabatan }}</span></h5>
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
                        <h2>Galeri LAM-PTKes</h2>
                        <p>Seputar Foto dan Video</p>
                    </div>
                    <hr class="space s">
                    <div class="grid-list gallery">
                        <div class="grid-box row" data-lightbox-anima="fade-left">
                            @foreach ($photos as $photo)
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
                    <a href="{{ route('gallery') }}">
                        <button type="button" name="ok" class="anima-button btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Lihat Photo Lainnya
                        </button>
                    </a>
                    <span class="space"></span>
                    <a href="{{ route('tvideo') }}">
                        <button type="button" name="ok" class="anima-button btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Lihat Video Lainnya
                        </button>
                    </a>
                    <span class="space"></span>
                </div>
                @foreach ($videos as $video)
                    <div class="col-md-4 col-sm-6 text-right" data-anima="fade-right">
                        <hr class="space">
                        {{-- <img src="{{ asset('lamptkes/images/avatar-3.jpg') }}" alt=""> --}}
                        <iframe width="260" src="{{ $video->link }}" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen>
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
                        <h2>Pendiri LAM-PTKes</h2>
                        <p>7 Organisasi Profesi dan 7 Asosiasi Institusi Pendidikan Kesehatan</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="flexslider carousel outer-navs png-boxed png-over text-center"
                        data-options="numItems:5,minWidth:100,itemMargin:30,controlNav:false,directionNav:true">
                        <ul class="slides">
                            @foreach ($ftr as $fot)
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
