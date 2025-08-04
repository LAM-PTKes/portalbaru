@extends('awal.template.appen')
@section('title', 'Journal List - IAAHEH')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Journal List</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active">Journal List</li>
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
	                                            <h2>{{ $jnl->judul_jurnal }}</h2>
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
                                                            {{ date('d F Y' ,strtotime($jnl->created_at)) }}
                                                        </a>
	                                                </span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <br>
	                                    	<div class="row">
	                                    		<div class="col-md-3">
                                    				Author Member Name 
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b> 
                                    			</div>
                                    			<div class="col-md-8">
                                    				{!! $jnl->nama_penulis !!}
                                    			</div>
	                                    	</div>

	                                    	<div class="row">
	                                    		<div class="col-md-3">
                                    				Keywords 
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b> 
                                    			</div>
                                    			<div class="col-md-8">
                                    				{!! $jnl->kata_kunci !!}
                                    			</div>
	                                    	</div>

	                                    	<div class="row">
	                                    		<div class="col-md-3">
                                    				Abstract 
                                    			</div>
                                    			<div class="col-md-1">
                                    				<b>:</b> 
                                    			</div>
                                    			<div class="col-md-8">
                                    				{!! str_limit($jnl->abstrak, $limit = 300, $end = '...') !!} 
                                                    <br>
                                                    <br>
                                                    <a class="btn btn-sm" href="{{route('djurnalen', $jnl->id ) }}">Read More</a>
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