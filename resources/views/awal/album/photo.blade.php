@extends('awal.template.app')
@section('title', 'Gallery - LAM-PTKes')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Album Photo</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/')}}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Album LAM-PTKes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty section-item">
        <div class="container content">
          <div class="row">
              @foreach($photos as $photo)
      					 <div class="col-md-3 col-sm-4 bot">
                			<a class="img-box i-center" href="{{ route('aphoto', $photo->id) }}">
                           <i class="fa fa-camera"></i>
                           <img src="{{ route('secure.document.folder', ['folder' => 'cover', 'filename' => $photo->nfile]) }}" alt="{{ $photo->nama_cover_id }}" class="img-rounded">
                       </a>
                  			<div class="tag-row">
                            <span>
                               <i class="fa fa-folder"></i>
                               <a href="{{ route('gallery') }}">Album</a>
                            </span>
                           <span><i class="fa fa-pencil"></i>Admin</span>
                  			</div>
              					<h2>
                           <a class="text-m" href="{{ route('aphoto',$photo->id) }}">
                           <p>{{ $photo->nama_cover_id }}</p>
                           </a>
                        </h2>
      		        </div>
              @endforeach
          </div>
        </div>
    </div>
    <div class="section-empty section-item">
      <div class="container content">
        <div class="list-nav">
          <center>
            {{ $photos->render() }}
          </center>
        </div>
      </div>
    </div>

    <br><br><br>

@endsection
