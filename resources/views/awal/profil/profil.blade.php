@extends('awal.template.app')
@section('title', 'Profil - LAM-PTKes')
@section('content')
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Profil LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halama</a></li>
                        <li class="active">Profil</li>
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
                                        <div class="tab-box" id="tab-classic" data-tab-anima="fade-right">
                                          <ul class="nav nav-tabs">
                                              <li class="active"><a href="#"><b>Profil</b></a></li>
                                              <li><a href="#"><b>Visi </b></a></li>
                                              <li><a href="#"><b>Misi </b></a></li>
                                              <li><a href="#"><b>Tujuan </b></a></li>
                                              <li><a href="#"><b>Kebijakan Mutu</b></a></li>
                                              <li><a href="#"><b>Langkah Strategis</b></a></li>
                                          </ul>
                                             <div class="panel active">
                                                 @foreach($pro as $v)
                                                      {!! $v->isi_profil !!}
                                                 @endforeach
                                              </div>
                                              <div class="panel">
                                                  @foreach($pro3 as $v)
                                                      {!! $v->isi_profil !!}
                                                  @endforeach
                                              </div>
                                              <div class="panel">
                                                  @foreach($pro4 as $v)
                                                      {!! $v->isi_profil !!}
                                                  @endforeach
                                              </div>
                                              <div class="panel">
                                                  @foreach($pro5 as $v)
                                                      {!! $v->isi_profil !!}
                                                  @endforeach
                                              </div>
                                              <div class="panel">
                                                  @foreach($pro1 as $v)
                                                      {!! $v->isi_profil !!}
                                                  @endforeach
                                              </div>
                                              <div class="panel">
                                                 @foreach($pro2 as $v)
                                                    {!! $v->isi_profil !!}
                                                 @endforeach
                                              </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              <hr class="space m" />
                          </div>
                      </div>
                      <div class="list-nav">

                      </div>
                  </div>
              </div>


                <div class="col-md-3 col-sm-12 widget">
                    <div class="list-group latest-post-list list-blog">
                      <div class="peny">
                    <h3 class="penny">
                      <i class="fa fa-newspaper-o"></i>
                        <a href="#" class="rsswidget">Seputar LAM-PTKes</a>
                    </h3>
                </div>
                        @foreach($beritas as $berita)
                        	<div class="list-group-item">
	                            <div class="row">
	                                <div class="col-md-4">
	                                    <a class="img-box circle">
                                            @if(file_exists('img/'. $berita->file_gambar))
	                                           <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $berita->file_gambar]) }}" alt="">
                                            @else
                                                <img src="{{ asset('img/kosong.png') }}" alt="">
                                            @endif
	                                    </a>
	                                </div>
	                                <div class="col-md-8">
	                                    <a href="{{ route('dberita', $berita->id) }}">
	                                        <h5>{{ $berita->judul }}</h5>
	                                    </a>
	                                    <div class="tag-row icon-row">
	                                    	<span>
	                                    		<i class="fa fa-calendar"></i>
	                                    		{{ date('d F Y', strtotime($berita->created_at))}}
	                                    	</span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        @endforeach
                    </div>
                        <a href="{{ route('tberita') }}">
                            <i class="fa fa-eye"> <u> Seputar Berita Lainnya</u></i>
                        </a>
                        <br>
                        <br>
                        <br>
                <div class="list-group latest-post-list list-blog">
                      <div class="peny">
                    <h3 class="penny">
                      <i class="fa fa-list-alt"></i>
                        <a href="#" class="rsswidget">Kegiatan LAM-PTKes</a>
                    </h3>
                </div>

                        @foreach($agendas as $agenda)
	                        <div class="list-group-item">
	                            <a href="{{ route('dagenda', $agenda->id) }}">
	                                <h5>{{ $agenda->nagenda }}</h5>
	                            </a>
 					                <div class="tag-row icon-row">
	                            	<span>
	                            		<i class="fa fa-calendar"></i>
	                            		{{ date('d F Y', strtotime($agenda->created_at) )}}
	                            	</span>
	                            </div>
	                                {!! str_limit($agenda->deskripsi, $limit = 100, $end = '...') !!}
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
