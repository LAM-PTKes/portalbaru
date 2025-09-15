@extends('awal.template.app')
@section('title', 'Site Map LAMPT-Kes')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Site Map LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
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
                                                Site Map LAMPT-Kes
                                            </h2>
                                            <div class="tag-row">
                                                <span><i class="fa fa-bookmark"></i> <a href="{{ route('tsitemap') }}">Site
                                                        Map</a></span>
                                                <span><i class="fa fa-pencil"></i>Admin</span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="excerpt">
                                    <p>
                                        <a href="{{ url('/') }}" target="_blank">
                                            <b>Beranda</b>
                                        </a>
                                    </p>
                                    <p>
                                        <b>Tentang Kami</b>
                                    </p>
                                    <p>
                                        &nbsp;&nbsp;
                                        <a href="{{ route('bprofil') }}" target="_blank">
                                            Profil
                                        </a>
                                    </p>
                                    <p>&nbsp;&nbsp; Organisasi</p>
                                    <p>&nbsp;&nbsp; Berita</p>
                                    <p>&nbsp;&nbsp; Regulasi</p>
                                    <p>&nbsp;&nbsp; Pengumuman</p>
                                    <p>&nbsp;&nbsp; Capaian Tahunan</p>
                                    <p>&nbsp;&nbsp; Tim Penilai</p>
                                    <p>&nbsp;&nbsp; Semua Unduhan</p>
                                    <p>&nbsp;&nbsp; Manual Simak</p>
                                    <p>&nbsp;&nbsp; Pedoman Tim Penilai</p>
                                    <p>&nbsp;&nbsp; FAQ</p>
                                    <p>&nbsp;&nbsp; Saran</p>
                                    <p>&nbsp;&nbsp; Sitemap</p>
                                    <p><b>Tentang Akreditasi</b></p>
                                    <p>&nbsp;&nbsp; Direktori Hasil Akreditasi</p>
                                    <p>&nbsp;&nbsp; Instrumen Akreditasi</p>
                                    <p>&nbsp;&nbsp; Prodi Proses Akreditasi</p>
                                    <p>&nbsp;&nbsp; Alur &amp; Tahapan Proses Akreditasi</p>
                                    <p><b>Galery</b></p>
                                    <p>&nbsp;&nbsp; Galery Photo</p>
                                    <p>&nbsp;&nbsp; Galery Video</p>
                                    <p><b>Hubungi Kami</b></p>
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
                                <a href="#" class="rsswidget">Seputar LAM-PTKes</a>
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
                                        <a href="{{ route('dberita', $berita->id) }}">
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
                </div>

            </div>
        </div>
    </div>

@endsection
