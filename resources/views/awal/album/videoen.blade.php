@extends('awal.template.appen')
@section('title', 'Gallery Video - IAAHEH')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Album Videos</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en')}}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Album Video IAAHEH</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <div class="section-empty section-item">
        <div class="container content">
            <div class="maso-list list-sm-6">
                <div class="maso-box row" data-lightbox-anima="fade-top">
                    @foreach($videos as $video)
	                    <a href="{{ $video->link }}" title="" target="_blank">
	                    	<iframe width="260"  src="{{ $video->link }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
							</iframe>
	                    </a>
                    @endforeach
                    <div class="list-nav">
                       {{ $videos->render() }}
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

@endsection