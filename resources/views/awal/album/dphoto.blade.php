@extends('awal.template.app')
@section('title', 'Gallery - LAM-PTKes')
@section('content')


    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Gallery Photo Detail</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/')}}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Gallery LAM-PTKes</li>
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
                            <li class="col-md-6 col-sm-4 col-md-3" data-src="{{ route('secure.document.nested', ['folder' => 'album', 'subfolder' => 'gallery', 'filename' => $v->nama_file]) }}" data-sub-html="<h4>LAM-PTKes</h4><p>{{$v->nphoto}}</p>">
                                <a href="">
                                    <img class="img-responsive" src="{{ route('secure.document.nested', ['folder' => 'album', 'subfolder' => 'gallery', 'filename' => $v->nama_file]) }}">
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
