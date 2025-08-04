@extends('awal.template.app')
@section('title', 'Daftar Jurnal - LAM-PTKes')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Daftar Jurnal</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Daftar Jurnal</li>
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
                        @foreach($jurnal as $jnl)
                        	<div class="grid-box row">
	                            <div class="grid-item col-md-12">
	                                <div class="advs-box niche-box-blog">
	                                    <div class="block-top">
	                                        <div class="block-title">
	                                            <h2 style="font-family: lucida bright; font-size: 16px;"><b>{{ $jnl->judul_jurnal }}</b></h2>
	                                            <div class="tag-row">
	                                                <span>
	                                                	<i class="fa fa-eye"></i> 
	                                                	<a href="#"> 
                                                            @if(empty($jnl->views))
                                                                0
                                                            @else
                                                                {{ $jnl->views }}
                                                            @endif
                                                        </a>
	                                                </span>
	                                                <span>
	                                                	<i class="fa fa-calendar"></i>
	                                                	<a>
                                                            {{ str_replace($bulan, $ganti, date('d F Y' ,strtotime($jnl->created_at))) }}
                                                        </a>
	                                                </span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <br>
	                                    	<div class="row">
	                                    		<div class="col-md-3">
                                    				<p style="font-family: lucida bright; font-size: 12px;">Nama Anggota Penulis</p> 
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b> 
                                    			</div>
                                    			<div class="col-md-8">
                                    				<p style="font-family: lucida bright; font-size: 12px;">{{ $jnl->nama_penulis }}</p>
                                    			</div>
	                                    	</div>

	                                    	<div class="row">
	                                    		<div class="col-md-3"> 
                                                    <p style="font-family: lucida bright; font-size: 12px;">Keyword</p> 
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b> 
                                    			</div>
                                    			<div class="col-md-8">
                                    				<p style="font-family: lucida bright; font-size: 12px;">{{ $jnl->kata_kunci }}</p>
                                    			</div>
	                                    	</div>

	                                    	<div class="row">
	                                    		<div class="col-md-3">
                                                    <p style="font-family: lucida bright; font-size: 12px;">Abstrak</p>
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b> 
                                    			</div>
                                    			<div class="col-md-8">
                                    				{{-- {!! str_limit($jnl->abstrak, $limit = 80, $end = '...') !!}  --}}
                                                    {!! $jnl->abstrak !!}
                                                    <br>
                                                    <br>
                                                    <a class="btn btn-sm" href="{{route('djurnal', $jnl->id ) }}">Baca Jurnal Selengkapnya</a>
                                    			</div>
	                                    	</div>
	                                </div>
	                                <hr class="space m" />
	                            </div>
	                        </div>
                        @endforeach
	                        
                        <div class="list-nav">
                            {!! $jurnal->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection