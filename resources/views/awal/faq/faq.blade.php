@extends('awal.template.app')
@section('title', 'Faq - LAM-PTKes')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Frequently asked questions</h1>
                        <p>Tentang LAM-PTKes</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Faqs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty section-item">
        <div class="container content">
            <div class="row">
                <div class="col-md-8">
                    <div id="general" class="title-base text-left">
                        <hr />
                        <h2>Quick LAM-PTKes</h2>
                    </div>
                    <div class="list-group accordion-list" data-time="1000" data-type='accordion'>
                        @foreach($faqs as $faq)
                        	<div class="list-group-item">
	                            <a>  {{ $faq->nfaq }} </a>
	                            <div class="panel">
	                                <div class="inner">
	                                    {!! $faq->deskripsi !!}
	                                </div>
	                            </div>
	                        </div>
                        @endforeach
                    </div>
                    <hr class="space l" />
                    <div id="financial" class="title-base text-left">
                        <hr />
                        <h2>Asked LAM-PTKes</h2>
                    </div>
                    <div class="list-group accordion-list" data-time="1000" data-type='accordion'>
                        @foreach($fq as $k)
                        	<div class="list-group-item">
	                            <a>  {{ $k->nfaq }} </a>
	                            <div class="panel">
	                                <div class="inner">
	                                    {!! $k->deskripsi !!}
	                                </div>
	                            </div>
	                        </div>
                        @endforeach
                    </div>
                    <hr class="space l" />
                </div>
                <div class="col-md-4 boxed-inverse bg-color-2">
                    <h4 class="text-normal">Informasi Kontak</h4>
                    <hr class="space xs" />
                    {{-- <ul class="list-texts">
                        @foreach($tentangs as $tentang)
                        	<li>
	                        	<b>{{ $tentang->ntentang }}</b>   
	                        	{{ $tentang->tlp }} <br>
	                        	<b>&nbsp;</b> 
	                        	{{ $tentang->ponsel }} <br>
	                        	<b>&nbsp;</b> 
	                        	{{ $tentang->kantor }}
	                        </li>
                        @endforeach
                    </ul> --}}
                    @foreach($tentangs as $tentang)
	                    <div class="row">
						    <div class="col-lg-5 ">
						     {{ $tentang->ntentang }}
						    </div>
						    <div class="col-lg-7 ">
						      {{ $tentang->tlp }}
						    </div>
						</div>
						<div class="row">
							<div class="col-lg-5">
							</div>
							<div class="col-lg-7">
								{{ $tentang->kantor }}
							</div>
						</div>
						<div class="row">
							<div class="col-lg-5">
							</div>
							<div class="col-lg-7">
								{{ $tentang->ponsel }}
							</div>
						</div>

						<div class="row">
							<div class="col-lg-5">
								Email
							</div>
							<div class="col-lg-7">
								{{ $tentang->email }}
							</div>
						</div>

						<div class="row">
							<div class="col-lg-5">
								Oprasional
							</div>
							<div class="col-lg-7">
								{{ $tentang->jam_kerja }}
							</div>
						</div>
						<div class="row">
							<div class="col-lg-5">
								Alamat
							</div>
							<div class="col-lg-7">
								{!! str_replace('Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan Indonesia', '', $tentang->alamat) !!}
							</div>
						</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
