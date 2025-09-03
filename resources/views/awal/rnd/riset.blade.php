@extends('awal.template.app')
@section('title', 'Laporan Riset - LAM-PTKes')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Laporan Riset</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Laporan Riset</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty section-item">
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    @foreach($riset as $rst)
                    <div class="advs-box advs-box-side-img advs-box-blog boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
                        <div class="row">
                            <div class="col-md-3">
                                <a class="img-box">
                                    <img class="anima" src="{{ route('secure.document.folder', ['folder' => 'riset', 'filename' => $rst->gambar_riset]) }}" alt=""   />
                                </a>
                            </div>
                            <div class="col-md-9">
                                <h2>
                                    <a href="{{route('dlpriset', $rst->id ) }}">
                                        {{ $rst->judul_riset }}
                                    </a>
                                </h2>
                                <hr>
                                <div class="tag-row icon-row">
                                    <span>
                                        <i class="fa fa-calendar"></i>
                                        <a>
                                            {{ date('d-m-Y', strtotime($rst->created_at )) }}
                                        </a>
                                    </span>
                                    <span>
                                        <i class="fa fa-eye"></i>
                                        <a href="#">
                                            @if(empty($rst->views))
                                                0
                                            @else
                                                {{ $rst->views }}
                                            @endif
                                        </a>
                                    </span>
                                    <span><i class="fa fa-pencil"></i><a>{{ $rst->pengarang_riset}}</a></span>
                                </div>
                                <p >
                                    {!! str_limit($rst->ringkasan_hasil_riset, $limit = 300, $end = '...') !!}
                                </p>
                                <a class="btn btn-sm" href="{{route('dlpriset', $rst->id ) }}">Baca Riset Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <hr class="space s" />
                    @endforeach
                    <center>
                        {!! $riset->render() !!}
                    </center>
                </div>
            </div>
        </div>
    </div>


@endsection
