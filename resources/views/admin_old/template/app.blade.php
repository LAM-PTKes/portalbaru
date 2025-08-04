<!DOCTYPE html>
<html lang="en{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="description" content="Responsive Alternative">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/vendors.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/app.bundle.css') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin/dist/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" href="{{ asset('web/logo-lam-214.png') }}" sizes="32x32">
        <link rel="mask-icon" href="{{ asset('admin/dist/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/datagrid/datatables/datatables.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/theme-demo.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/datagrid/datatables/datatables.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/fa-solid.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/formplugins/summernote/summernote-lite.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">

        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/notifications/sweetalert2/sweetalert2.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/formplugins/summernote/summernote-lite.css') }}">
        <!-- page related CSS below -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/formplugins/select2/select2.bundle.css') }}">
        <script src="{{ asset('admin/dist/js/ajaxjquery.min.js') }}"></script>
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *  This script should be placed right after the body tag for fast execution 
             *  Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="{{ route('dashboard') }}" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                            <img src="{{ asset('admin/dist/img/logo.png') }}" alt="Portal WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">Portal WebApp</span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card">
                            <img src="{{ asset('web/personal.png') }}" class="profile-image rounded-circle" alt="">
                            <div class="info-card-text">
                                <a href="{{ route('dashboard') }}" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        Selamat Datang <br>     
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>
                                {{-- <span class="d-inline-block text-truncate text-truncate-sm">Toronto, Canada</span> --}}
                            </div>
                            <img src="{{ asset('admin/dist/img/card-backgrounds/cover-2-lg.png') }}" class="cover" alt="cover">
                            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                                <i class="fal fa-angle-down"></i>
                            </a>
                        </div>
                        <ul id="js-nav-menu" class="nav-menu">
                            <li class="nav-title">Menu</li>
                            <li>
                                <a href="{{ route('dashboard') }}" title="Beranda" data-filter-tags="Beranda">
                                    <i class="fas fa-home"></i>
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pengguna') }}" title="Profile" data-filter-tags="Profile">
                                    <i class="fas fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'Sekretariat' || auth()->user()->role == 'Akreditasi')
                                <li>
                                    <a href="{{ route('unduhan') }}" title="File Unduhan" data-filter-tags="File Unduhan">
                                        <i class="fas fa-download fa-2x"></i>
                                        File Unduhan
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Hasil Akreditasi" data-filter-tags="Hasil Akreditasi">
                                        <i class="fas fa-clipboard-list"></i>
                                        <span class="nav-link-text" data-i18n="nav.Hasil Akreditasi">Hasil Akreditasi</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('akreditasi') }}" title="Publish Hasil Akreditasi" data-filter-tags="Publish Hasil Akreditasi">
                                                <span class="nav-link-text" data-i18n="nav.Publish Hasil Akreditasi">Publish</span> 
                                                <i class="fas fa-eye fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('unpublishhasilakre') }}" title="Unpublish Hasil Akreditas" data-filter-tags="Unpublish Hasil Akreditas">
                                                <span class="nav-link-text" data-i18n="nav.Unpublish Hasil Akreditas">Unpublish</span>
                                                <i class="fas fa-eye-slash fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('addsimak') }}" title="Add SIMAk" data-filter-tags="Add SIMAk">
                                                <span class="nav-link-text" data-i18n="nav.Add SIMAk">Add SIMAk</span>
                                                <i class="fas fa-plus fa-2x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                            @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'Sekretariat')
                                <li>
                                    <a href="{{ route('saran') }}" title="Saran" data-filter-tags="Saran">
                                        <i class="fas fa-comments"></i>
                                        Saran
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Kategori" data-filter-tags="Kategori">
                                        <i class="fas fa-th-list"></i>
                                        <span class="nav-link-text" data-i18n="nav.Kategori">Kategori</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('bahasa') }}" title="Bahasa" data-filter-tags="Bahasa">
                                                <span class="nav-link-text" data-i18n="nav.Bahasa">Bahasa</span> 
                                                <i class="fas fa-globe fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('katberita') }}" title="Berita" data-filter-tags="Berita">
                                                <span class="nav-link-text" data-i18n="nav.Berita">Berita</span>
                                                <i class="fas fa-newspaper fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('katunduhan') }}" title="Unduhan" data-filter-tags="Unduhan">
                                                <span class="nav-link-text" data-i18n="nav.Unduhan">Unduhan</span>
                                                <i class="fas fa-download fa-2x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="Berita" data-filter-tags="Berita">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="nav-link-text" data-i18n="nav.Berita">Berita</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('berita') }}" title="Publish" data-filter-tags="Publish">
                                                <span class="nav-link-text" data-i18n="nav.Publish">Publish</span> 
                                                <i class="fas fa-eye fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('brtunpublish') }}" title="Unpublish" data-filter-tags="Unpublish">
                                                <span class="nav-link-text" data-i18n="nav.Unpublish">Unpublish</span>
                                                <i class="fas fa-eye-slash fa-2x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="LAM-PTKes" data-filter-tags="LAM-PTKes">
                                        <i class="fas fa-university"></i>
                                        <span class="nav-link-text" data-i18n="nav.LAM-PTKes">LAM-PTKes</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('profil') }}" title="Profile" data-filter-tags="Profile">
                                                <span class="nav-link-text" data-i18n="nav.Profile">Profile</span> 
                                                <i class="fas fa-hand-point-left fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('organ') }}" title="Organisasi" data-filter-tags="Organisasi">
                                                <span class="nav-link-text" data-i18n="nav.Organisasi">Organisasi</span>
                                                <i class="fas fa-hand-point-left fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('ori') }}" title="Orientasi" data-filter-tags="Orientasi">
                                                <span class="nav-link-text" data-i18n="nav.Orientasi">Orientasi</span>
                                                <i class="fas fa-hand-point-left fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('rencana') }}" title="Rencana Strategis" data-filter-tags="Rencana Strategis">
                                                <span class="nav-link-text" data-i18n="nav.Rencana Strategis">Rencana Strategi</span>
                                                <i class="fas fa-hand-point-left fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('agenda') }}" title="Agenda Kegiatan" data-filter-tags="Agenda Kegiatan">
                                                <span class="nav-link-text" data-i18n="nav.Agenda Kegiatan">Agenda Kegiatan</span>
                                                <i class="fas fa-hand-point-left fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('capaian') }}" title="Capaian Tahunan" data-filter-tags="Capaian Tahunan">
                                                <span class="nav-link-text" data-i18n="nav.Capaian Tahunan">Capaian Tahunan</span>
                                                <i class="fas fa-hand-point-left fa-2x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="Tentang Kami" data-filter-tags="Tentang Kami">
                                        <i class="fas fa-sitemap"></i>
                                        <span class="nav-link-text" data-i18n="nav.Tentang Kami">Tentang Kami</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('testimoni') }}" title="Testimoni" data-filter-tags="Testimoni">
                                                <span class="nav-link-text" data-i18n="nav.Testimoni">Testimoni</span>
                                                <i class="fas fa-share fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('kontak') }}" title="Kontak Kami" data-filter-tags="Kontak Kami">
                                                <span class="nav-link-text" data-i18n="nav.Kontak Kami">Kontak Kami</span>
                                                <i class="fas fa-share fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('footer') }}" title="Footer" data-filter-tags="Footer">
                                                <span class="nav-link-text" data-i18n="nav.Footer">Footer</span>
                                                <i class="fas fa-share fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('faq') }}" title="FAQ" data-filter-tags="FAQ">
                                                <span class="nav-link-text" data-i18n="nav.FAQ">FAQ</span>
                                                <i class="fas fa-share fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('qna') }}" title="Q&A Akreditasi" data-filter-tags="Q&A Akreditasi">
                                                <span class="nav-link-text" data-i18n="nav.Q&A Akreditasi">Q&A Akreditasi</span>
                                                <i class="fas fa-share fa-2x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="Gallery" data-filter-tags="Gallery">
                                        <i class="fas fa-images"></i>
                                        <span class="nav-link-text" data-i18n="nav.Gallery">Gallery</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('cover') }}" title="Cover Album Photo" data-filter-tags="Cover Album Photo">
                                                <span class="nav-link-text" data-i18n="nav.Cover Album Photo">Cover Album Photo</span>
                                                <i class="fas fa-image"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('photo') }}" title="Album Photo" data-filter-tags="Album Photo">
                                                <span class="nav-link-text" data-i18n="nav.Album Photo">Album Photo</span>
                                                <i class="fas fa-image"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('video') }}" title="Album Video" data-filter-tags="Album Video">
                                                <span class="nav-link-text" data-i18n="nav.FAQ">Album Video</span>
                                                <i class="fas fa-video"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            
                            @if(auth()->user()->role == 'Ngadimin')
                                <li class="nav-title">Administrator</li>
                                <li>
                                    <a href="{{ route('user') }}" title="Daftar User" data-filter-tags="Daftar User">
                                        <i class="fas fa-users"></i>
                                        Daftar User
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#" title="Data Alih Bentuk" data-filter-tags="Data Alih Bentuk">
                                        <i class="fas fa-exchange-alt"></i>
                                        Data Alih Bentuk
                                    </a>
                                </li> --}}
                            @endif
                        </ul>
                    <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
                    <div class="nav-footer shadow-top">
                        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                            <i class="ni ni-chevron-right"></i>
                            <i class="ni ni-chevron-right"></i>
                        </a>
                        {{-- <ul class="list-table m-auto nav-footer-buttons">
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                                    <i class="fal fa-comments"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                                    <i class="fal fa-life-ring"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                                    <i class="fal fa-phone"></i>
                                </a>
                            </li>
                        </ul> --}}
                    </div> <!-- END NAV FOOTER -->
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                                <img src="{{ asset('admin/dist/img/logo.png') }}" alt="" aria-roledescription="logo">
                                <span class="page-logo-text mr-1"></span>
                                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>
                        {{-- <div class="search">
                            <form class="app-forms hidden-xs-down" method="GET" role="search" action="{{ route('search') }}" autocomplete="off">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <input type="text" name="cari" id="search-field" placeholder="Search for anything" class="form-control" tabindex="1">
                                <a href="#" onclick="return false;" class="btn-danger btn-search-close js-waves-off d-none" data-action="toggle" data-class="mobile-search-on">
                                    <i class="fal fa-times"></i>
                                </a>
                            </form>
                        </div> --}}
                        <div class="ml-auto d-flex">
                            <!-- app user menu -->
                            <div>
                                <a href="#" data-toggle="dropdown" title="" class="header-icon d-flex align-items-center justify-content-center ml-2">
                                    <img src="{{ asset('web/personal.png') }}" class="profile-image rounded-circle" alt="">
                                    <!-- you can also add username next to the avatar with the codes below:
                                    <span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
                                    <i class="ni ni-chevron-down hidden-xs-down"></i> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">
                                                <img src="{{ asset('web/personal.png') }}" class="rounded-circle profile-image" alt="">
                                            </span>
                                            <div class="info-card-text">
                                                <div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}</div>
                                                <span class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <div class="dropdown-divider m-0"></div>
                                    <div class="dropdown-divider m-0"></div>

                                    <a class="dropdown-item fw-500 pt-3 pb-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span data-i18n="drpdwn.page-logout">Logout</span>
                                        <span class="float-right fw-n"></span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    
                    @yield('content')

                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
                        <marquee>
                            <div class="d-flex align-items-center flex-1 text-muted">
                                <span class="hidden-md-down fw-700">2021 © Portal WebApp  by&nbsp; IT LAM-PTKes</span>
                            </div>
                        </marquee>
                    </footer>
                    <!-- END Page Footer -->
                    <!-- BEGIN Shortcuts -->
                    <!-- modal shortcut -->
                    <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul class="app-list w-auto h-auto p-0 text-left">
                                        <li>
                                            <a href="{{ route('dashboard') }}" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                    <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Home
                                                </span>
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a href="#" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
                                                    <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Inbox
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                    <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Add More
                                                </span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- END Shortcuts -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
        <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
        
        <nav class="shortcut-menu d-none d-sm-block">
            <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
            <label for="menu_open" class="menu-open-button ">
                <span class="app-shortcut-icon d-block"></span>
            </label>
            <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
                <i class="fal fa-arrow-up"></i>
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
                <i class="fal fa-sign-out"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
                <i class="fal fa-expand"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
                <i class="fal fa-print"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="Voice command">
                <i class="fal fa-microphone"></i>
            </a>
        </nav>
        <!-- END Quick Menu -->
        <script src="{{ asset('admin/dist/js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('admin/dist/js/app.bundle.js') }}"></script>
        <script src="{{ asset('admin/dist/js/datagrid/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('admin/dist/js/datagrid/datatables/datatables.export.js') }}"></script>
        <script src="{{ asset('admin/dist/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('admin/dist/js/notifications/sweetalert2/sweetalert2.bundle.js') }}"></script>
        <script src="{{ asset('admin/dist/js/formplugins/summernote/summernote-lite.js') }}"></script>
        <script src="{{ asset('admin/dist/js/formplugins/select2/select2.bundle.js') }}"></script>
        <script>
            $(document).ready(function()
            {
                $(function()
                {
                    $('.select2').select2();

                    $(".select2-placeholder-multiple").select2(
                    {
                        placeholder: "Select State"
                    });
                    $(".js-hide-search").select2(
                    {
                        minimumResultsForSearch: 1 / 0
                    });
                    $(".js-max-length").select2(
                    {
                        maximumSelectionLength: 2,
                        placeholder: "Select maximum 2 items"
                    });
                    $(".select2-placeholder").select2(
                    {
                        placeholder: "Select a state",
                        allowClear: true
                    });



                    $(".js-select2-icons").select2(
                    {
                        minimumResultsForSearch: 1 / 0,
                        templateResult: icon,
                        templateSelection: icon,
                        escapeMarkup: function(elm)
                        {
                            return elm
                        }
                    });

                    function icon(elm)
                    {
                        elm.element;
                        return elm.id ? "<i class='" + $(elm.element).data("icon") + " mr-2'></i>" + elm.text : elm.text
                    }

                    $(".js-data-example-ajax").select2(
                    {
                        ajax:
                        {
                            url: "https://api.github.com/search/repositories",
                            dataType: 'json',
                            delay: 250,
                            data: function(params)
                            {
                                return {
                                    q: params.term, // search term
                                    page: params.page
                                };
                            },
                            processResults: function(data, params)
                            {
                                // parse the results into the format expected by Select2
                                // since we are using custom formatting functions we do not need to
                                // alter the remote JSON data, except to indicate that infinite
                                // scrolling can be used
                                params.page = params.page || 1;

                                return {
                                    results: data.items,
                                    pagination:
                                    {
                                        more: (params.page * 30) < data.total_count
                                    }
                                };
                            },
                            cache: true
                        },
                        placeholder: 'Search for a repository',
                        escapeMarkup: function(markup)
                        {
                            return markup;
                        }, // let our custom formatter work
                        minimumInputLength: 1,
                        templateResult: formatRepo,
                        templateSelection: formatRepoSelection
                    });

                    function formatRepo(repo)
                    {
                        if (repo.loading)
                        {
                            return repo.text;
                        }

                        var markup = "<div class='select2-result-repository clearfix d-flex'>" +
                            "<div class='select2-result-repository__avatar mr-2'><img src='" + repo.owner.avatar_url + "' class='width-2 height-2 mt-1 rounded' /></div>" +
                            "<div class='select2-result-repository__meta'>" +
                            "<div class='select2-result-repository__title fs-lg fw-500'>" + repo.full_name + "</div>";

                        if (repo.description)
                        {
                            markup += "<div class='select2-result-repository__description fs-xs opacity-80 mb-1'>" + repo.description + "</div>";
                        }

                        markup += "<div class='select2-result-repository__statistics d-flex fs-sm'>" +
                            "<div class='select2-result-repository__forks mr-2'><i class='fal fa-lightbulb'></i> " + repo.forks_count + " Forks</div>" +
                            "<div class='select2-result-repository__stargazers mr-2'><i class='fal fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
                            "<div class='select2-result-repository__watchers mr-2'><i class='fal fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
                            "</div>" +
                            "</div></div>";

                        return markup;
                    }

                    function formatRepoSelection(repo)
                    {
                        return repo.full_name || repo.text;
                    }

                });
            });

        </script>
        <script>
            var autoSave = $('#autoSave');
            var interval;
            var timer = function()
            {
                interval = setInterval(function()
                {
                    //start slide...
                    if (autoSave.prop('checked'))
                        saveToLocal();

                    clearInterval(interval);
                }, 3000);
            };

            //save
            var saveToLocal = function()
            {
                localStorage.setItem('summernoteData', $('#saveToLocal').summernote("code"));
                console.log("saved");
            }

            //delete 
            var removeFromLocal = function()
            {
                localStorage.removeItem("summernoteData");
                $('#saveToLocal').summernote('reset');
            }

            $(document).ready(function()
            {
                //init default
                $('.js-summernote').summernote(
                {
                    height: 200,
                    tabsize: 2,
                    placeholder: "Note : Mohon Tidak Copas Langsung Dari Website/Word/Excel/Power Poin Dll. Jika Mau Copas dari Website/Word/Excel/Power Poin, Copas Dulu Ke Notepad/Sticky Note Baru Copas Ke Sini.",
                    fontNames: ['Arial', 'Arial Black', 'Calibri', 'Calibri Bold',
                                'Calibri Italic', 'Comic Sans MS', 'Courier New',
                                'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande', 
                                'Lucida Bright', 'Tahoma', 
                                'Times New Roman', 'Verdana'
                                ],
                    fontSizes: ['8', '9', '10', '11', '12','13', '14', '16', '18', '20', '24', '36'],
                    // dialogsFade: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks:
                    {
                        //restore from localStorage
                        onInit: function(e)
                        {
                            $('.js-summernote').summernote("code");
                        },
                        onChange: function(contents, $editable)
                        {
                            clearInterval(interval);
                            timer();
                        }
                    }
                });

                //load emojis
                $.ajax(
                {
                    url: 'https://api.github.com/emojis',
                    async: false
                }).then(function(data)
                {
                    window.emojis = Object.keys(data);
                    window.emojiUrls = data;
                });

                //init emoji example
                $(".js-hint2emoji").summernote(
                {
                    height: 100,
                    toolbar: false,
                    placeholder: 'type starting with : and any alphabet',
                    hint:
                    {
                        match: /:([\-+\w]+)$/,
                        search: function(keyword, callback)
                        {
                            callback($.grep(emojis, function(item)
                            {
                                return item.indexOf(keyword) === 0;
                            }));
                        },
                        template: function(item)
                        {
                            var content = emojiUrls[item];
                            return '<img src="' + content + '" width="20" /> :' + item + ':';
                        },
                        content: function(item)
                        {
                            var url = emojiUrls[item];
                            if (url)
                            {
                                return $('<img />').attr('src', url).css('width', 20)[0];
                            }
                            return '';
                        }
                    }
                });

                //init mentions example
                $(".js-hint2mention").summernote(
                {
                    height: 100,
                    toolbar: false,
                    placeholder: "type starting with @",
                    hint:
                    {
                        mentions: ['jayden', 'sam', 'alvin', 'david'],
                        match: /\B@(\w*)$/,
                        search: function(keyword, callback)
                        {
                            callback($.grep(this.mentions, function(item)
                            {
                                return item.indexOf(keyword) == 0;
                            }));
                        },
                        content: function(item)
                        {
                            return '@' + item;
                        }
                    }
                });

            });

        </script>
        <script>
            // Class definition

            var controls = {
                leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            }

            var runDatePicker = function()
            {

                // minimum setup
                $('#datepicker').datepicker(
                {
                    todayHighlight: true,
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                    orientation: "bottom left",
                    templates: controls
                });

                // minimum setup
                $('#datepicker-1').datepicker(
                {
                    todayHighlight: true,
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                    orientation: "top left",
                    templates: controls
                });


                // input group layout 
                $('#datepicker-2').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });

                // input group layout for modal demo
                $('#datepicker-modal-2').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });

                // enable clear button 
                $('#datepicker-3').datepicker(
                {
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });

                // enable clear button for modal demo
                $('#datepicker-modal-3').datepicker(
                {
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });

                // orientation 
                $('#datepicker-4-1').datepicker(
                {
                    orientation: "top left",
                    todayHighlight: true,
                    templates: controls
                });

                $('#datepicker-4-2').datepicker(
                {
                    orientation: "top right",
                    todayHighlight: true,
                    templates: controls
                });

                $('#datepicker-4-3').datepicker(
                {
                    orientation: "bottom left",
                    todayHighlight: true,
                    templates: controls
                });

                $('#datepicker-4-4').datepicker(
                {
                    orientation: "bottom right",
                    todayHighlight: true,
                    templates: controls
                });

                // range picker
                $('#datepicker-5').datepicker(
                {
                    todayHighlight: true,
                    autoclose: true,
                    format: 'dd-mm-yyyy',
                    templates: controls
                });

                // inline picker
                $('#datepicker-6').datepicker(
                {
                    todayHighlight: true,
                    templates: controls
                });
            }

            $(document).ready(function()
            {
                runDatePicker();
            });

        </script>
        <script>
            $('#summernote').summernote({
                placeholder: 'Ketik Disini',
                tabsize: 2,
                height: 200,
                toolbar: [
                        ['style', ['style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    
              });
        </script>
        <script>
            var autoSave = $('#autoSave');
            var interval;
            var timer = function()
            {
                interval = setInterval(function()
                {
                    //start slide...
                    if (autoSave.prop('checked'))
                        saveToLocal();

                    clearInterval(interval);
                }, 3000);
            };

            //save
            var saveToLocal = function()
            {
                localStorage.setItem('summernoteData', $('#saveToLocal').summernote("code"));
                console.log("saved");
            }

            //delete 
            var removeFromLocal = function()
            {
                localStorage.removeItem("summernoteData");
                $('#saveToLocal').summernote('reset');
            }

            $(document).ready(function()
            {
                //init default
                $('.js-summernote').summernote(
                {
                    height: 200,
                    tabsize: 2,
                    placeholder: "Ketik Disini...",
                    dialogsFade: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks:
                    {
                        //restore from localStorage
                        onInit: function(e)
                        {
                            $('.js-summernote').summernote("code", localStorage.getItem("summernoteData"));
                        },
                        onChange: function(contents, $editable)
                        {
                            clearInterval(interval);
                            timer();
                        }
                    }
                });

                //load emojis
                $.ajax(
                {
                    url: 'https://api.github.com/emojis',
                    async: false
                }).then(function(data)
                {
                    window.emojis = Object.keys(data);
                    window.emojiUrls = data;
                });

                //init emoji example
                $(".js-hint2emoji").summernote(
                {
                    height: 100,
                    toolbar: false,
                    placeholder: 'type starting with : and any alphabet',
                    hint:
                    {
                        match: /:([\-+\w]+)$/,
                        search: function(keyword, callback)
                        {
                            callback($.grep(emojis, function(item)
                            {
                                return item.indexOf(keyword) === 0;
                            }));
                        },
                        template: function(item)
                        {
                            var content = emojiUrls[item];
                            return '<img src="' + content + '" width="20" /> :' + item + ':';
                        },
                        content: function(item)
                        {
                            var url = emojiUrls[item];
                            if (url)
                            {
                                return $('<img />').attr('src', url).css('width', 20)[0];
                            }
                            return '';
                        }
                    }
                });

                //init mentions example
                $(".js-hint2mention").summernote(
                {
                    height: 100,
                    toolbar: false,
                    placeholder: "type starting with @",
                    hint:
                    {
                        mentions: ['jayden', 'sam', 'alvin', 'david'],
                        match: /\B@(\w*)$/,
                        search: function(keyword, callback)
                        {
                            callback($.grep(this.mentions, function(item)
                            {
                                return item.indexOf(keyword) == 0;
                            }));
                        },
                        content: function(item)
                        {
                            return '@' + item;
                        }
                    }
                });

            });

        </script>
        <script>
            $(document).ready(function()
            {

                // initialize datatable
                $('#dt-basic-example').dataTable(
                {
                    responsive: true,
                    lengthChange: false,
                    dom:
                        /*  --- Layout Structure 
                            --- Options
                            l   -   length changing input control
                            f   -   filtering input
                            t   -   The table!
                            i   -   Table information summary
                            p   -   pagination control
                            r   -   processing display element
                            B   -   buttons
                            R   -   ColReorder
                            S   -   Select

                            --- Markup
                            < and >             - div element
                            <"class" and >      - div with a class
                            <"#id" and >        - div with an ID
                            <"#id.class" and >  - div with an ID and a class

                            --- Further reading
                            https://datatables.net/reference/option/dom
                            --------------------------------------
                         */
                        "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        /*{
                            extend:    'colvis',
                            text:      'Column Visibility',
                            titleAttr: 'Col visibility',
                            className: 'mr-sm-3'
                        },*/
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            titleAttr: 'Generate PDF',
                            orientation: 'landscape',
                            pageSize: 'A4',
                            className: 'btn-outline-danger btn-sm mr-1'
                        },
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            titleAttr: 'Generate Excel',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            className: 'btn-outline-success btn-sm mr-1'
                        },
                        {
                            extend: 'csvHtml5',
                            text: 'CSV',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            titleAttr: 'Generate CSV',
                            className: 'btn-outline-warning btn-sm mr-1'
                        },
                        {
                            extend: 'copyHtml5',
                            text: 'Copy',
                            titleAttr: 'Copy to clipboard',
                            className: 'btn-outline-dark btn-sm mr-1'
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            titleAttr: 'Print Table',
                            className: 'btn-outline-primary btn-sm'
                        }
                    ]
                });

            });

        </script>
    </body>
</html>
