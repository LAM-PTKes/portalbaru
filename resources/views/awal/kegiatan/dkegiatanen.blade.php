@extends('awal.template.appen')
@section('title', 'Activity Details - IAAHEH')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Activity Details</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Activity Details</li>
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
	                                            <h2>{{ $agenda->nagenda }}</h2>
	                                            <div class="tag-row">
	                                                <span>
	                                                	<i class="fa fa-map-marker"></i>
	                                                	<a href="#">{{ $agenda->lokasi }}</a>
	                                                </span>
	                                                <span>
	                                                	<i class="fa fa-calendar"></i>
	                                                	<a>{{ date('d F Y' ,strtotime($agenda->created_at)) }}</a>
	                                                </span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <br>
	                                    	<div class="row">
	                                    		<div class="col-md-2">
                                    				Organizers
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b>
                                    			</div>
                                    			<div class="col-md-9">
                                    				{!! $agenda->penyelenggara !!}
                                    			</div>
	                                    	</div>
	                                    	<hr class="space m" />

	                                    	<div class="row">
	                                    		<div class="col-md-2">
                                    				Location
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b>
                                    			</div>
                                    			<div class="col-md-9">
                                    				{!! $agenda->lokasi !!}
                                    			</div>
	                                    	</div>
	                                    	<hr class="space m" />

	                                    	<div class="row">
	                                    		<div class="col-md-2">
                                    				Contact
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b>
                                    			</div>
                                    			<div class="col-md-9">
                                    				{!! $agenda->kontak !!}
                                    			</div>
	                                    	</div>
	                                    	<hr class="space m" />

	                                    	<div class="row">
	                                    		<div class="col-md-2">
                                    				Website
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b>
                                    			</div>
                                    			<div class="col-md-9">
                                    				{!! $agenda->website !!}
                                    			</div>
	                                    	</div>
	                                    	<hr class="space m" />

	                                    	<div class="row">
	                                    		<div class="col-md-2">
                                    				City
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b>
                                    			</div>
                                    			<div class="col-md-9">
                                    				{!! $agenda->kota !!}
                                    			</div>
	                                    	</div>
	                                    	<hr class="space m" />

	                                    	<div class="row">
	                                    		<div class="col-md-2">
                                    				Activity Date
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b>
                                    			</div>
                                    			<div class="col-md-9">
                                    				{!! date('d F Y', strtotime($agenda->tanggal_kegiatan)) !!}
                                    			</div>
	                                    	</div>
	                                    	<hr class="space m" />

	                                    	<div class="row">
	                                    		<div class="col-md-2">
                                    				Activity time
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b>
                                    			</div>
                                    			<div class="col-md-9">
                                    				{!! $agenda->waktu_kegiatan !!}
                                    			</div>
	                                    	</div>
	                                    	<hr class="space m" />

	                                    	<div class="row">
	                                    		<div class="col-md-2">
                                    				Description
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b>
                                    			</div>
                                    			<div class="col-md-9">
                                    				{!! $agenda->deskripsi !!}
                                    			</div>
	                                    	</div>
	                                    	<hr class="space m" />
	                                </div>
	                                <hr class="space m" />
	                            </div>
	                        </div>

                        <div class="list-nav">
                            {{-- <ul class="pagination pagination-grid hide-first-last" data-page-items="3" data-pagination-anima="show-scale" data-options="scrollTop:true"></ul> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 widget">
                    <div class="list-group latest-post-list list-blog">
                        <p class="list-group-item active">Most Popular News</p>
                        @foreach($populer as $ppl)
                        	<div class="list-group-item">
	                            <div class="row">
	                                <div class="col-md-4">
	                                    <a class="img-box circle">
                                            @if(!empty($ppl->file_gambar) || file_exists($ppl->file_gambar))
                                                <img src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $ppl->file_gambar]) }}" alt="">
                                            @else
                                                <img src="{{ asset('img/kosong.png') }}" alt="">
                                            @endif
	                                    </a>
	                                </div>
	                                <div class="col-md-8">
	                                    <a href="{{ route('dberitaen', $ppl->id) }}">
	                                        <h5>{{ $ppl->judul }}</h5>
	                                    </a>
	                                    <div class="tag-row icon-row">
	                                    	<span>
	                                    		<i class="fa fa-calendar"></i>
	                                    		{{ date('d F Y', strtotime($ppl->created_at)) }}
	                                    	</span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        @endforeach
                    </div>
                    <div class="list-group latest-post-list list-blog">
                        <p class="list-group-item active">Announcement IAAHEH</p>
                        @foreach($pengumumans as $pnm)
                        	<div class="list-group-item">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <a href="{{ route('dpengumen', $pnm->id) }}">
	                                        <h5>{{ str_limit($pnm->judul, $limit = 50, $end = '...') }}</h5>
	                                    </a>
	                                    <div class="tag-row icon-row">
	                                    	<span>
	                                    		<i class="fa fa-calendar"></i>
	                                    		{{ date('d F Y', strtotime($pnm->created_at)) }}
	                                    	</span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
