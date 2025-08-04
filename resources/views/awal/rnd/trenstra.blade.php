@extends('awal.template.app')
@section('title', 'Renstra - LAM-PTKes')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Renstra LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Renstra</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
     <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                <div class="col-md-9 col-sm-12">

                    @foreach($renstra as $rnt)
                    {{-- <div class='embed-responsive' style='padding-bottom:150%'>
                        <embed src="{{ asset('renstra/'. $rnt->nfile ) }}" width="100%" height="100%" type="application/pdf" >
                    </div>  --}}
                    <embed src="{{ route('secure.document.folder', ['folder' => 'renstra', 'filename' => $rnt->nfile]) }}" type="application/pdf" style="width: 100%; height: 500px;"></embed>
                    @endforeach

                </div>
                <div class="col-md-3 col-sm-12 widget">
                    <div class="list-group latest-post-list list-blog">
                       <div class="peny">
                            <h3 class="penny">
                              <i class="fa fa-list-alt"></i>
                                <a href="#" class="rsswidget">Kegiatan LAM-PTKes</a>
                            </h3>
                        </div>
                        @foreach($agendas as $agenda)
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
                        <i class="fa fa-eye">
                            <u>Kegiatan Lainnya</u>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
