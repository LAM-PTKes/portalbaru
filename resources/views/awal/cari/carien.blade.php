@extends('awal.template.appen')
@section('title', 'Search Result')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Search Result : {{ $cari }}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Search </li>
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
                            @foreach($hasil as $v)
                                <div class="grid-item col-md-12">
                                    <div class="advs-box niche-box-blog">
                                        <div class="block-top">
                                            <div class="block-title">
                                                <h2>
                                                    <a href="{{ route('dcarien', $v->id)}}">
                                                        {{ $v->judul }}
                                                    </a>
                                                </h2>
                                                <div class="tag-row">
                                                    <span>
                                                        <i class="fa fa-bookmark"></i> 
                                                        <a href="#">{{ str_replace($katacari, $ganti, $v->katberita->namakbrt) }}</a>
                                                    </span>
                                                    <span>
                                                        <i class="fa fa-calendar"></i>
                                                        <a>{{ date('d F Y' ,strtotime($v->created_at)) }}</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- {!! str_limit($v->isi, $limit = 50, $end = '...') !!} --}}
                                    </div>
                                    <hr class="space m" />
                                </div>
                            @endforeach
                        </div>
                        <div class="list-nav">
                            {{ $hasil->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection