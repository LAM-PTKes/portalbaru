<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="LAM-PTKes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('web/logo-lam-214.png') }}" sizes="32x32">
    <title>@yield('title')</title>
    <meta name="description" content="Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan Indonesia.">
    <script src="{{ asset('lamptkes/HTWF/scripts/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/scripts/bootstrap/css/bootstrap.css') }}">
    <script src="{{ asset('lamptkes/HTWF/scripts/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/style.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/css/image-box.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/scripts/flexslider/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/scripts/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/scripts/php/contact-form.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/scripts/social.stream.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('lamptkes/skin.css') }}">
    <link rel="icon" href="{{ asset('lamptkes/images/favicon.ico') }}">
    <link href="{{ asset('lamptkes/HTWF/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('lamptkes/HTWF/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('lamptkes/HTWF/plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('lamptkes/HTWF/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('lamptkes/dist/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/css/style.css') }}">

    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('lamptkes/auto/jquery-ui.css') }}">
    <script src="{{ asset('lamptkes/auto/jquery-ui.js') }}"></script>

    <script src="{{ asset('infografis/js/highmaps.js') }}"></script>
    <script src="{{ asset('infografis/js/exporting.js') }}"></script>
    <script src="{{ asset('infografis/js/id-all.js') }}"></script>

</head>

<a href="{{ route('cdha') }}" class="float float-x">
    <i class="fa fa-trophy my-float"></i>
</a>
<div class="label-container float-x">
    <div class="label-text">HASIL AKREDITASI</div>
    <i class="fa fa-play label-arrow"></i>
</div>

<a href="{{ route('tjurnal') }}" target="_blank" class="float float-fb">
    <i class="fa fa-book my-float"></i>
</a>
<div class="label-container float-fb">
    <div class="label-text">JURNAL ILMIAH</div>
    <i class="fa fa-play label-arrow"></i>
</div>

<a href="https://lamptkes.org/Glosarium" target="_blank" class="float float-tw">
    <i class="fa fa-bookmark my-float"></i>
</a>
<div class="label-container float-tw">
    <div class="label-text">GLOSARIUM AKREDITASI</div>
    <i class="fa fa-play label-arrow"></i>
</div>

<body>
    <header class="fixed-top scroll-change" data-menu-anima="fade-in" style="height: 0px">
        <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
            <div class="navbar-mini scroll-hide">
                <div class="container">
                    <div class="nav navbar-nav navbar-left">
                        @foreach ($tentangs as $tentang)
                            <span>
                                <i class="fa fa-phone"></i>
                                {{ $tentang->tlp }}
                            </span>
                            <hr />
                            <span>
                                <a href="mailto:sekretariat@lamptkes.org?subject=feedback" "email me">
                                    <i class="fa fa-envelope"></i>
                                    {{ $tentang->email }}
                                </a>
                            </span>
                            <hr />
                            <span>
                                <i class="fa fa-calendar"></i>
                                {{ $tentang->jam_kerja }}
                            </span>
                        @endforeach
                    </div>
                    <div class="nav navbar-nav navbar-right">
                        <div class="minisocial-group">
                            <a target="_blank" href="https://www.facebook.com/lamptkes/"><i
                                    class="fa fa-facebook first"></i></a>
                            <a target="_blank" href="https://www.instagram.com/lamptkes/"><i
                                    class="fa fa-instagram"></i></a>
                            <a target="_blank" href="https://www.twitter.com/lamptkes/"><i
                                    class="fa fa-twitter"></i></a>
                            <a target="_blank" href="https://www.youtube.com/channel/UCowwtmEZB6Nw0fQozyA2qsQ"><i
                                    class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-main">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{ route('beranda') }}">
                            <img class="logo-default" src="{{ asset('lamptkes/images/logo/logo.png') }}"
                                alt="logo" />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="{{ route('beranda') }}" role="button">
                                    {{-- Home --}}<i class="fa fa-home text-m"></i>
                                </a>
                            </li>
                            <li class="dropdown mega-dropdown mega-tabs">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tentang Kami <span
                                        class="caret"></span></a>
                                <div class="mega-menu dropdown-menu multi-level row bg-menu">
                                    <div class="tab-box" data-tab-anima="fade-left">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#">Tentang dan Informasi LAM-PTKes</a>
                                            </li>
                                            <li><a href="#">Peraturan dan Layanan</a></li>
                                            <li><a href="#">Dukungan Layanan</a></li>
                                        </ul>
                                        <div class="panel active">
                                            <div class="col">
                                                <h5>Tentang LAM-PTKes</h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('bprofil') }}">Profil LAM-PTKes</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('torgan') }}">Organisasi LAM-PTKes</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="#">Renstra LAM-PTKes</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5>Profil Pimpinan</h5>
                                                <ul class="fa-ul text-s">
                                                    <li><i class="fa-li fa fa-list"></i> <a
                                                            href="{{ route('rapatanggota') }}">Rapat Anggota</a></li>
                                                    <li><i class="fa-li fa fa-list"></i> <a
                                                            href="{{ route('pengawas') }}">Pengawas LAM-PTKes</a></li>
                                                    <li><i class="fa-li fa fa-list"></i> <a
                                                            href="{{ route('pengurus') }}">Pengurus LAM-PTKes</a></li>
                                                    <li><i class="fa-li fa fa-list"></i> <a
                                                            href="{{ route('koordinator') }}">Koordinator</a></li>
                                                    <li><i class="fa-li fa fa-list"></i> <a
                                                            href="{{ route('subkoor') }}">Sub Koordinator</a></li>
                                                    <li><i class="fa-li fa fa-list"></i> <a
                                                            href="{{ route('komite') }}">Komite Akreditasi</a></li>
                                                    <li><i class="fa-li fa fa-list"></i> <a
                                                            href="{{ route('pmi') }}">Penjaminan Mutu Internal</a>
                                                    </li>
                                                    <!-- <li><i class="fa-li fa fa-list"></i> <a href="{{ route('direktorat') }}">Direktorat</a></li> -->
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5>LAM-PTKes Terkini</h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tberita') }}">Berita Terkini</a>
                                                    </li>
                                                    <!-- <li>
                                                                                  <i class="fa-li fa fa-list"></i>
                                                                                  <a href="{{ route('regulasi') }}">Regulasi</a>
                                                                              </li> -->
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tagenda') }}">Kegiatan LAM-PTKes</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tpengumuman') }}">Pengumuman LAM-PTKes</a>
                                                    </li>
                                                    <!-- <li>
                                                                                  <i class="fa-li fa fa-list"></i>
                                                                                  <a href="#">Rekrutmen Asesor</a>
                                                                              </li> -->
                                                    <!-- <li>
                                                                                  <i class="fa-li fa fa-list"></i>
                                                                                  <a href="{{ route('timp') }}">Tim Penilai</a>
                                                                              </li>
                                                                              <li>
                                                                                  <i class="fa-li fa fa-list"></i>
                                                                                  <a href="{{ route('dberita', 'a2a8f9f1bc334a5e94f21280536cbd99') }}">Simak Minimum</a>
                                                                              </li>
                                                                              <li>
                                                                                  <i class="fa-li fa fa-list"></i>
                                                                                  <a href="{{ route('tglosariumakreditasi') }}">Glosarium Akreditasi</a>
                                                                              </li> -->
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5>Laporan LAM-PTKes</h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tcapaian') }}">Laporan Tahunan</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="col">
                                                <h5>Peraturan</h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('reguu') }}">Undang-Undang</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('regpem') }}">Peraturan Pemerintah</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('regpres') }}">Peraturan Presiden</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('regmen') }}">Peraturan Menteri</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('regbanpt') }}">Peraturan BAN-PT</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('reglamptkes') }}">Peraturan LAM-PTKes</a>
                                                    </li>
                                                    <!-- <li>
                                                                                  <i class="fa-li fa fa-list"></i>
                                                                                  <a href="#">Pedoman Tim Penilai</a>
                                                                              </li> -->
                                                    <!-- <li>
                                                                                  <i class="fa-li fa fa-list"></i>
                                                                                  <a href="https://dev-simakv2.lamptkes.org">Developer SIMAk V2</a>
                                                                              </li> -->
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5>Layanan</h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a
                                                            href="https://lamptkes.org/Pencarian/af83b584bdb349059ef460e6d2c990e9/Detail">Permohonan
                                                            Legalisir</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="#">SK Prodi Baru</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="#">Penyesuaian Akreditasi</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="#">Klinik Akreditasi</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tunduhan') }}">Semua Unduhan</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="col">
                                                <h5>Dukungan</h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tsaran') }}">Saran & Harapan</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tfaq') }}">FAQ LAM-PTKes</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tsitemap') }}">Sitemap LAM-PTKes</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown mega-dropdown mega-tabs">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Akreditasi <span
                                        class="caret"></span></a>
                                <div class="mega-menu dropdown-menu multi-level row bg-menu wow">
                                    <div class="tab-box" data-tab-anima="fade-left">
                                        <div class="panel active">
                                            <div class="col">
                                                <h5><b>Direktori Hasil Akreditasi</b></h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('dhakre') }}">Hasil Akreditasi Reguler</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('alldhamini') }}">Hasil Akreditasi Prodi
                                                            Baru</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5><b>Biaya Akreditasi</b></h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tbiayakred') }}">Biaya Akreditasi</a>
                                                    </li>
                                                    <!--
                                                <li>
                                                    <i class="fa-li fa fa-list"></i>
                                                    <a href="#">Biaya Banding</a>
                                                </li>
                                                <li>
                                                    <i class="fa-li fa fa-list"></i>
                                                    <a href="#">Biaya Akreditasi Prodi Baru</a>
                                                </li> -->
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tpd') }}">Cara Pengembalian Dana</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tpbp') }}">Pajak & Bukti Potong</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5><b>Akreditasi LAM-PTKes</b></h5>
                                                <ul class="fa-ul text-s space-y-4" style="margin-bottom: 1rem;">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('iakresembilan') }}">
                                                            {{-- Instrumen 9 Kriteria --}}
                                                            Instrumen APS Kuantitatif
                                                            <sup style="color: red">(2020 - 2024)</sup>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('iakreminimum') }}">Instrumen Izin Prodi
                                                            Baru</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i><b>Instrumen APS Kualitatif</b>
                                                        <sup style="color: red">New</sup>
                                                        <ul>
                                                            <!-- <li><a href="{{ route('iakreapsterakred') }}">Terakreditasi</a></li> -->
                                                            <li><a href="{{ route('iakreapsterakredunggul') }}">Terakreditasi
                                                                    Unggul</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('pakre') }}">Telusur Proses Akreditasi</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tqaakre') }}">Alur dan Tahapan
                                                            Akreditasi</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tdokper') }}">Dokumen Persyaratan
                                                            Akreditasi</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tglosariumakreditasi') }}">Glosarium
                                                            Akreditasi</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5><b>Panduan Penggunaan</b></h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tmanualsimak') }}">SIMAk Reguler</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a
                                                            href="{{ route('dberita', 'a2a8f9f1bc334a5e94f21280536cbd99') }}">SIMAk
                                                            Prodi Baru</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5><b>Tim Penilai</b></h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('timp') }}">Tim Penilai</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button">Riset & Publikasi<span class="caret"></span></a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="{{ route('vsurvei') }}">Survei</a></li>
                                    <li><a href="{{ route('lpriset') }}">Laporan Riset</a></li>
                                    <li><a href="{{ route('tjurnal') }}">Jurnal Ilmiah</a></li>
                                    <li><a href="{{ route('statistik') }}">Statistik</a></li>
                                    <li><a href="{{ route('infograf') }}">Infografis</a></li>
                                    <li><a href="{{ route('tnewslet') }}">Newsletter</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button">Galeri <span class="caret"></span></a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="{{ route('gallery') }}">Galeri Photo</a></li>
                                    <li><a href="{{ route('tvideo') }}">Galeri Video</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('hubkami') }}" role="button">Kontak</a>
                            </li>
                        </ul>
                        <div class="nav navbar-nav navbar-right">
                            <div class="search-box-menu">
                                <form action="{{ route('cari') }}" method="get">
                                    {{ csrf_field() }}
                                    {{ method_field('patch') }}
                                    <div class="search-box scrolldown">
                                        <input type="text" name="keyword" class="form-control"
                                            placeholder="Ketikan Kata Kunci...">
                                    </div>
                                    <button type="button" class="btn btn-default btn-search">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </form>
                            </div>
                            <ul class="nav navbar-nav lan-menu">
                                <li class="dropdown">
                                    <a href="https://akreditasi.lamptkes.org/" target="_blank" role="button">
                                        <i class="fa fa-user" aria-hidden="true"></i> &nbsp;
                                        SIMAk online
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    @yield('content')

    <footer class="footer-base">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-center text-left">
                        @foreach ($tentangs as $tentang)
                            <img width="300" src="{{ asset('lamptkes/images/logo-lam-footer.png') }}"
                                alt="" />
                            <hr class="space m" />
                            <p style="color: #000;" class="text-s">{!! $tentang->alamat !!}</p>
                            <div class="tag-row text-s">
                                <span style="color: #000;"><a style="color: #000;"
                                        href="mailto:sekretariat@lamptkes.org?subject=feedback" "email me">
                                        {{ $tentang->email }}
                                    </a></span>

                                <span style="color: #000;">{{ $tentang->tlp }}</span><br>
                                <span style="color: #000;">{{ $tentang->ponsel }}</span>
                                <span style="color: #000;">{{ $tentang->kantor }}</span>
                            </div>
                        @endforeach
                        <hr class="space m" />
                        <div class="btn-group social-group btn-group-icons">
                            <a target="_blank" href="https://www.facebook.com/lamptkes/">
                                <i style="color: #000;" class="fa fa-facebook text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://twitter.com/lamptkes">
                                <i style="color: #000;" class="fa fa-twitter text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://www.instagram.com/lam_ptkes/?hl=id">
                                <i style="color: #000;" class="fa fa-instagram text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://www.youtube.com/channel/UCowwtmEZB6Nw0fQozyA2qsQ">
                                <i style="color: #000;" class="fa fa-youtube text-xs circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 footer-left text-left">
                        <div class="row">
                            <div class="col-md-6 text-s">
                                <h3>Menu</h3>
                                <a style="color: #000;" href="{{ route('beranda') }}">Beranda</a><br />
                                <a style="color: #000;" href="{{ route('statistik') }}">Statistik</a><br />
                                <a style="color: #000;" href="{{ route('tnewslet') }}">Newsletter</a><br />
                                <a style="color: #000;" href="{{ route('tglosariumakreditasi') }}">Glosarium
                                    Akreditasi</a><br />
                                <a style="color: #000;" href="{{ route('tfaq') }}">FAQ</a><br />
                                <a style="color: #000;" href="{{ route('tsitemap') }}">Sitemap</a><br />
                                <a style="color: #000;" href="{{ route('hubkami') }}" role="button">Kontak
                                    Kami</a><br />
                            </div>
                            <div class="col-md-6 text-s">
                                <h3>Tautan Terkait</h3>
                                <a style="color: #000;" href="https://www.kemdikbud.go.id/" target="_blank">
                                    KEMDIKBUD
                                </a><br />
                                <a style="color: #000;" href="https://wfme.org/" target="_blank">
                                    WFME
                                </a><br />
                                <a style="color: #000;" href="https://banpt.or.id/" target="_blank">
                                    BAN-PT
                                </a><br />
                                <a style="color: #000;" href="https://www.apqr.co/" target="_blank">
                                    APQR
                                </a><br />
                                <a style="color: #000;" href="http://kki.go.id/" target="_blank">
                                    KKI
                                </a><br />
                                <a style="color: #000;" href="https://apqn.org/" target="_blank">
                                    APQN
                                </a><br />
                                <a style="color: #000;" href="https://www.inqaahe.org/" target="_blank">
                                    INQAAHE
                                </a><br />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 footer-left text-left">
                        <h3>Standar Mutu Terbaik</h3>
                        <p style="color: #000;" class="text-s">
                            Telah bersertifikat ISO 9001:2015, memastikan kualitas manajemen yang unggul dan pelayanan
                            terbaik.
                        </p>
                        <hr class="space xs" />
                        <img width="110" src="{{ asset('lamptkes/images/kan-9001.png') }}"
                            alt="banpt" />&nbsp;&nbsp;&nbsp;
                        <img width="60" src="{{ asset('lamptkes/images/ISO-9001.png') }}" alt="banpt" />
                    </div>
                </div>
            </div>
            <div class="row copy-row">
                <div style="color: #000;" class="col-md-12 copy-text">
                    Copyright © {{ date('Y') }} All Rights Reserved by <a style="color: #000;"
                        href="lamptkes.org">LAM-PTKes</a>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="{{ asset('lamptkes/HTWF/scripts/font-awesome/css/font-awesome.css') }}">
        <script src="{{ asset('lamptkes/HTWF/scripts/jquery.twbsPagination.min.js') }}"></script>
        <script async src="{{ asset('lamptkes/HTWF/scripts/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('lamptkes/HTWF/scripts/imagesloaded.min.js') }}"></script>
        <script src="{{ asset('lamptkes/HTWF/scripts/parallax.min.js') }}"></script>
        <script src="{{ asset('lamptkes/HTWF/scripts/flexslider/jquery.flexslider-min.js') }}"></script>
        {{-- <script async src="{{ asset('lamptkes/HTWF/scripts/isotope.min.js') }}"></script> --}}
        {{-- <script async src="{{ asset('lamptkes/HTWF/scripts/php/contact-form.js') }}"></script> --}}
        <script async src="{{ asset('lamptkes/HTWF/scripts/jquery.progress-counter.js') }}"></script>
        <script async src="{{ asset('lamptkes/HTWF/scripts/jquery.tab-accordion.js') }}"></script>
        <script async src="{{ asset('lamptkes/HTWF/scripts/bootstrap/js/bootstrap.popover.min.js') }}"></script>
        {{-- <script async src="{{ asset('lamptkes/HTWF/scripts/jquery.magnific-popup.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('lamptkes/HTWF/scripts/social.stream.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('lamptkes/HTWF/scripts/jquery.slimscroll.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('lamptkes/HTWF/scripts/smooth.scroll.min.js') }}"></script> --}}
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js"></script>

        <!-- jQuery  -->
        {{-- <script src="{{ asset('lamptkes/HTWF/assets/js/jquery.min.js') }}"></script> --}}
        <script src="{{ asset('lamptkes/HTWF/assets/js/bootstrap.bundle.min.js') }}"></script>
        {{-- <script src="{{ asset('lamptkes/HTWF/assets/js/metisMenu.min.js') }}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.min.js"></script>
        <script src="{{ asset('lamptkes/HTWF/assets/js/waves.js') }}"></script>
        {{-- <script src="{{ asset('lamptkes/HTWF/assets/js/jquery.slimscroll.js') }}"></script> --}}

        <!-- Required datatable js -->
        <script src="{{ asset('lamptkes/HTWF/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('lamptkes/HTWF/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('lamptkes/HTWF/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('lamptkes/HTWF/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        {{-- <script src="{{ asset('lamptkes/HTWF/plugins/datatables/jszip.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('lamptkes/HTWF/plugins/datatables/pdfmake.min.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script> --}}
        {{-- <script src="{{ asset('lamptkes/HTWF/plugins/datatables/vfs_fonts.js') }}"></script> --}}
        {{-- <script src="{{ asset('lamptkes/HTWF/plugins/datatables/buttons.html5.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('lamptkes/HTWF/plugins/datatables/buttons.print.min.js') }}"></script> --}}

        <!-- Key Tables -->
        {{-- <script src="{{ asset('lamptkes/HTWF/plugins/datatables/dataTables.keyTable.min.js') }}"></script> --}}

        <!-- Responsive examples -->
        <script src="{{ asset('lamptkes/HTWF/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('lamptkes/HTWF/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Selection table -->
        {{-- <script src="{{ asset('lamptkes/HTWF/plugins/datatables/dataTables.select.min.js') }}"></script> --}}

        <script src="{{ asset('admin/dist/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('lamptkes/HTWF/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('lamptkes/HTWF/assets/js/jquery.app.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });
                // Key Tables

                $('#key-table').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table1').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table2').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table3').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table4').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table5').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table6').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table7').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table8').DataTable({
                    keys: true,
                    responsive: true
                });

                $('#key-table9').DataTable({
                    keys: true,
                    responsive: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            });
        </script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#lightgallery').lightGallery();
            });
        </script>
        <!-- GetButton.io widget -->
        <script type="text/javascript">
            (function() {
                var options = {
                    whatsapp: "+62 811-9173-306", // WhatsApp number
                    call_to_action: "Pusat Bantuan Kami", // Call to action
                    button_color: "#FF6550", // Color of button
                    position: "left", // Position may be 'right' or 'left'
                };
                var proto = 'https:',
                    host = "getbutton.io",
                    url = proto + '//static.' + host;
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = url + '/widget-send-button/js/init.js';
                s.onload = function() {
                    WhWidgetSendButton.init(host, proto, options);
                };
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- /GetButton.io widget -->
        <script src="{{ asset('lamptkes/dist/js/lightgallery-all.min.js') }}"></script>
        <script src="{{ asset('lamptkes/lib/jquery.mousewheel.min.js') }}"></script>
        <script async data-id="22298" src="https://cdn.widgetwhats.com/script.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    </footer>

</body>

</html>
