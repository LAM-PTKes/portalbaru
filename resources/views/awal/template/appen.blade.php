
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
    <meta name="description" content="Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan Indonesia">
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
    <link href="{{ asset('lamptkes/HTWF/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('lamptkes/HTWF/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('lamptkes/HTWF/plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('lamptkes/HTWF/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('lamptkes/dist/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('lamptkes/css/style.css') }}">

</head>
<body>


<a href="{{ route('cdhaen') }}" class="float float-x">
<i class="fa fa-trophy my-float"></i>
</a>
<div class="label-container float-x">
<div class="label-text">Accreditation Results</div>
<i class="fa fa-play label-arrow"></i>
</div>

<a href="https://akreditasi.lamptkes.org/" target="_blank" class="float float-fb">
<i class="fa fa-graduation-cap my-float"></i>
</a>
<div class="label-container float-fb">
<div class="label-text">SIMAk ONLINE</div>
<i class="fa fa-play label-arrow"></i>
</div>


<a href="https://akreditasiminimum.lamptkes.org" target="_blank" class="float float-tw">
<i class="fa fa-id-card-o my-float"></i>
</a>
<div class="label-container float-tw">
<div class="label-text">SIMAk MINIMUM</div>
<i class="fa fa-play label-arrow"></i>
</div>


<div class="float float-y">
<a href="http://simpel.lamptkes.org/" target="_blank" class="float float-y">
<i class="fa fa-globe my-float"></i>
</a>
<div class="label-container float-y">
<div class="label-text">SIMPEL ONLINE</div>
<i class="fa fa-play label-arrow"></i>
</div>
</div>


    <header class="fixed-top scroll-change" data-menu-anima="fade-in">
        <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
            <div class="navbar-mini scroll-hide">
                <div class="container">
                    <div class="nav navbar-nav navbar-left">
                        @foreach($tentangs as $tentang)
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
                            <a target="_blank" href="https://www.facebook.com/lamptkes/"><i class="fa fa-facebook first"></i></a>
                            <a target="_blank" href="https://www.instagram.com/lamptkes/"><i class="fa fa-instagram"></i></a>
                            <a target="_blank" href="https://www.twitter.com/lamptkes/"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="https://www.youtube.com/channel/UCowwtmEZB6Nw0fQozyA2qsQ"><i class="fa fa-youtube"></i></a>
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
                        <a class="navbar-brand" href="{{ route('inggris') }}">
                            <img class="logo-default" src="{{ asset('lamptkes/images/logo/logoen.png') }}" alt="logo" />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="{{ route('inggris') }}"  role="button">Home
                                    </a>
                                {{-- <ul class="dropdown-menu multi-level">
                                    <li>
                                        <a href="{{ route('beranda') }}">
                                            Home
                                        </a>
                                    </li>
                                </ul> --}}
                            </li>
                            {{-- <li class="dropdown">
                                <a href="{{ route('beranda') }}" class="dropdown-toggle" data-toggle="dropdown" role="button">Home </a>
                            </li> --}}
                            <li class="dropdown mega-dropdown mega-tabs">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us <span class="caret"></span></a>
                                <div class="mega-menu dropdown-menu multi-level row bg-menu">
                                    <div class="tab-box" data-tab-anima="fade-left">
                                        <div class="panel active">
                                            <div class="col">
                                                <h5><b>About of IAAHEH</b></h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('bprofilen') }}">Profile</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('torganen') }}">Organization</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5><b>Information About IAAHEH</b></h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tberitaen') }}">News</a>
                                                    </li>
                                                    <!-- <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('regulasien') }}">Regulations</a>
                                                    </li> -->
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tagendaen') }}">Activity</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tpengumumanen') }}">Announcement</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5><b>About Accreditation</b></h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                      <i class="fa-li fa fa-list"></i>
                                                      <a href="{{ route('cdhaen') }}">Accreditation Results</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tcapaianen') }}">Annual Achievement</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tgrafen') }}">Infographics</a>
                                                    </li>
                                                    {{-- <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('timpen') }}">Assessment Team</a>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                            {{-- <div class="col">
                                                <h5><b>Guide</b></h5>
                                                <ul class="fa-ul text-s">
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tmanualsimaken') }}">SIMAk Guidance</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="#">Assessment Team Guideline</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('dberitaen', 'a2a8f9f1bc334a5e94f21280536cbd99') }}">SIMAk Minimum</a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                            <div class="col">
                                                <h5><b>Service</b></h5>
                                                <ul class="fa-ul text-s">
                                                <li>
                                                    <i class="fa-li fa fa-list"></i>
                                                    <a href="{{ route('tfaqen') }}">FAQ</a>
                                                </li>
                                                     <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tsaranen') }}">Suggestions</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa-li fa fa-list"></i>
                                                        <a href="{{ route('tsitemapen') }}">Sitemap</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <h5><b>Download</b></h5>
                                                <ul class="fa-ul text-s">
                                                <li>
                                                    <i class="fa-li fa fa-list"></i>
                                                    <a href="{{ route('tunduhanen') }}">All Downloaded</a>
                                                </li>
                                                <li>
                                                    <i class="fa-li fa fa-list"></i>
                                                    <a href="{{ route('alurakre') }}">Flow of Accreditation</a>
                                                </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                             {{-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">About Accreditation<span class="caret"></span></a>
                                <ul class="dropdown-menu multi-level">

                                    <li><a href="{{ route('dhakreen') }}">Directory of Accreditation Results</a></li>
				                    <li><a href="{{ route('maren') }}">Medical Accreditation Results</a></li>
                                    <li><a href="{{ route('iakreen') }}">Accreditation Instruments</a></li>
                                    <li><a href="{{ route('iakresembilanen') }}">Instrument 9 Criteria</a></li>
                                    <li><a href="{{ route('pakreen') }}">Accreditation Process Study Program</a></li>
                                    <li><a href="{{ route('tqaakreen') }}">Flow & Process Stages of Accreditation</a></li>

                                </ul>
                            </li> --}}
			                          <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Regulation <span class="caret"></span></a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="{{ route('regucon') }}">Constitution</a></li>
                                    <li><a href="{{ route('regupd') }}">Presidential decree</a></li>
                                    <li><a href="{{ route('regugr') }}">Government Regulations</a></li>
                                    <li><a href="{{ route('regumr') }}">Ministerial Regulations</a></li>
                                    <li><a href="{{ route('regubanpt') }}">NAAHE Regulations</a></li>
                                    <li><a href="{{ route('regulam') }}">IAAHEH Regulations</a></li>
                                </ul>
                            </li>
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Gallery <span class="caret"></span></a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="{{ route('galleryen') }}">Photos</a></li>
                                    <li><a href="{{ route('tvideoen') }}">Videos</a></li>
                                </ul>
                            </li>
                             <li class="dropdown">
                                <a href="{{ route('hubkamien') }}"  role="button">Contact Us </a>

                            </li>
                        </ul>
                        <div class="nav navbar-nav navbar-right">
                            <div class="search-box-menu">
                                <form action="{{ route('carien') }}" method="get">
                                    {{ csrf_field() }}
                                    {{ method_field('patch') }}
                                    <div class="search-box scrolldown">
                                        <input type="text" name="keyword" class="form-control" placeholder="Keyword...">
                                    </div>
                                    <button type="button" class="btn btn-default btn-search">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </form>
                            </div>
                            <ul class="nav navbar-nav lan-menu">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                        <i class="fa fa-language" aria-hidden="true"></i> &nbsp;
                                        Language
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-level">
                                        <li>
                                            <a href="{{ route('beranda') }}">
                                                <img src="{{ asset('lamptkes/images/idn.png') }}" alt="" />
                                                Indonesia
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('inggris') }}">
                                                <img src="{{ asset('lamptkes/images/en.png') }}" alt="" />
                                                English
                                            </a>
                                        </li>
                                    </ul>
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
                    <div class="col-md-4 footer-left text-left">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Menu</h3>
                                <ul class="ul-dots text-s">
                                    @foreach($ft as $k)
                                        <li>
                                            <a href="{{ $k->url }}">
                                                {{ $k->nlink }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3>Link</h3>
                                <ul class="ul-dots text-s">
                                        <!-- <li>
                                            <a href="https://ristekdikti.go.id/" target="_blank">
                                                RISTEKDIKTI
                                            </a>
                                        </li> -->
                                        <li>
                                            <a href="https://banpt.or.id/" target="_blank">
                                                BAN-PT
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://kki.go.id/" target="_blank">
                                                KKI
                                            </a>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 footer-center text-left">
                        <h3>Recognized by:</h3>
                        <p class="text-s">
                            <div class="btn-group social-group btn-group-icons">
                                    <a target="_blank" href="#" data-social="share-facebook">
                                        <img width="50" src="{{ asset('lamptkes/images/ban-pt-white.png') }}" alt="" />
                                    </a>
                                    <a target="_blank" href="#" data-social="share-facebook">
                                        <img width="50" src="{{ asset('lamptkes/images/apqr.png') }}" alt="" />
                                    </a><br><br>
                                     <a target="_blank" href="#" data-social="share-facebook">
                                        <img width="160" src="{{ asset('lamptkes/images/wfme-white.png') }}" alt="" />
                                    </a>

                            </div>
                        </p>
                        <hr class="space s" />
                        <h3>Member of:</h3>
                       <div class="btn-group social-group btn-group-icons">
                            <a target="_blank" href="#" data-social="share-facebook">
                                <img width="70" src="{{ asset('lamptkes/images/apqn.jpg') }}" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 footer-right text-left">
                        <img width="150" src="{{ asset('lamptkes/images/logo/logowhiteen.png') }}" alt="" />
                        <hr class="space m" />
                        @foreach($tentangs as $tentang)
                        {!! $tentang->alamat !!}
                            <div class="tag-row text-s">
                                <span>
                                    <a href="mailto:sekretariat@lamptkes.org?subject=feedback" "email me">
                                        {{ $tentang->email }}
                                    </a>
                                </span>
                                <span>{{ $tentang->tlp }}</span><br>
                                <span>{{ $tentang->ponsel }}</span>
                                <span>{{ $tentang->kantor }}</span>
                            </div>
                            @endforeach
                        <hr class="space m" />
                        <div class="btn-group social-group btn-group-icons">
                            <a target="_blank" href="https://www.facebook.com/lamptkes/" data-social="share-facebook">
                                <i class="fa fa-facebook text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://twitter.com/lamptkes" data-social="share-twitter">
                                <i class="fa fa-twitter text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://www.instagram.com/lamptkes/" data-social="share-instagram">
                                <i class="fa fa-instagram text-xs circle"></i>
                            </a>
                             <a target="_blank" href="https://www.youtube.com/channel/UCowwtmEZB6Nw0fQozyA2qsQ" data-social="share-youtube">
                                <i class="fa fa-youtube text-xs circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row copy-row">
                <div class="col-md-12 copy-text">
                    Copyright © {{ date('Y')}} All Rights Reserved by LAM-PTKes
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
        {{-- <script src="{{ asset('lamptkes/HTWF/scripts/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('lamptkes/HTWF/scripts/smooth.scroll.min.js') }}"></script> --}}
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js"></script>
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
                    keys: true
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
            } );

        </script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
        </script>
<script src="{{ asset('lamptkes/dist/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('lamptkes/lib/jquery.mousewheel.min.js') }}"></script>
<script async data-id="22298" src="https://cdn.widgetwhats.com/script.min.js"></script>
   </footer>

</body>
</html>
