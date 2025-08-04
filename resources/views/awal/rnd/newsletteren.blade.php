@extends('awal.template.appen')
@section('title', 'Newsletters of IAAHEH')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Newsletters of IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active">Newsletters</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty section-item">
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    @foreach($nleter as $nlt)
                    <div class="advs-box advs-box-side-img advs-box-blog boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
                        <div class="row">
                            <div class="col-md-3">
                                <a class="img-box">
                                    <img class="anima" src="{{ route('secure.document.folder', ['folder' => 'newsletter', 'filename' => $nlt->gambar]) }}" alt=""  />
                                </a>
                            </div>
                            <div class="col-md-9">
                                <h2>
                                    <a href="{{route('dnewslet', $nlt->id ) }}">
                                        {{ $nlt->judul }}
                                    </a>
                                </h2>
                                <hr>
                                <div class="tag-row icon-row">
                                    <span>
                                        <i class="fa fa-calendar"></i>
                                        <a>
                                            {{ date('d F Y', strtotime($nlt->created_at )) }}
                                        </a>
                                    </span>
                                    <span>
                                        <i class="fa fa-eye"></i>
                                        <a href="#">
                                            @if(empty($nlt->views))
                                                0
                                            @else
                                                {{ $nlt->views }}
                                            @endif
                                        </a>
                                    </span>
                                    <span><i class="fa fa-pencil"></i><a>admin</a></span>
                                </div>
                                <p >
                                    {!! str_limit($nlt->deskripsi, $limit = 300, $end = '...') !!}
                                </p>
                                <a class="btn btn-sm" href="{{route('dnewsleten', $nlt->id ) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                    <hr class="space s" />
                    @endforeach
                    <center>
                        {!! $nleter->render() !!}
                    </center>
                </div>
            </div>
        </div>
    </div>


@endsection
