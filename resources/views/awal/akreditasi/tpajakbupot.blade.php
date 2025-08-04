@extends('awal.template.app')
@section('title', 'Pajak dan Bukti Potong')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Pajak & Bukti Potong</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Pajak & Bukti Potong</li>
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
                                                Pajak & Bukti Potong
                                            </h2>
                                            <div class="tag-row">
                                                <span><i class="fa fa-bookmark"></i> <a href="{{ route('tpbp') }}">Pajak &
                                                        Bukti Potong</a></span>
                                                <span><i class="fa fa-pencil"></i>Admin</span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="excerpt">
                                    <p><strong>Pajak Biaya Akreditasi </strong></p>
                                    <ul>
                                        <li>Pajak Profesi Non Kedokteran dan Spesialis Rp 1.600.000</li>
                                        <li>Pajak Profesi Kedokteran Rp 2.200.000</li>
                                        <li>Pajak Vokasi dan Akademik Rp 1.310.000</li>
                                    </ul>
                                    <p><strong>Pajak Biaya Banding</strong></p>
                                    <ul>
                                        <li>Pajak banding sebesar Rp 700.000</li>
                                    </ul>
                                    <p><strong>Pajak Biaya Prodi Baru (Simak Minimum)</strong></p>
                                    <ul>
                                        <li>Pajak Prodi Profesi Non Kedokteran dan Baru Vokasi, Akademik &amp; Spesialis
                                            sebesar Rp 800.000;</li>
                                        <li>Pajak Prodi Baru Kedokteran sebesar Rp 1.820.000</li>
                                    </ul>
                                    </p>
                                   <!--  <a href="{{ asset('unduhan/' . collect($udh)->pluck('nama_file')->first()) }}"
                                        target="blank">
                                        <button type="button" class="anima-button btn-sm btn">
                                            <i class="fa fa-download"></i>
                                            Contoh Bukti Potong Pajak (Unduh Disini)
                                        </button>
                                    </a> -->
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
