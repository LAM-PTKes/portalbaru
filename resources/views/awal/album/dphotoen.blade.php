@extends('awal.template.appen')
@section('title', 'Gallery - IAAHEH')
@section('content')


    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Gallery Photo Details</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en')}}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Gallery IAAHEH</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="section-empty section-item">
        <div class="container content">
            <div class="maso-list list-sm-6">
                <div class="demo-gallery">
                    <ul id="lightgallery" class="list-unstyled row">
                        @foreach($image as $v)
                            <li class="col-md-6 col-sm-4 col-md-3" data-src="{{ route('secure.document.folder', ['folder' => 'album/gallery', 'filename' => $v->nama_file]) }}" data-sub-html="<h4>IAAHEH</h4><p>{{$v->nphoto}}</p>">
                                <a href="">
                                    <img class="img-responsive" src="{{ route('secure.document.folder', ['folder' => 'album/gallery', 'filename' => $v->nama_file]) }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>

@endsection
