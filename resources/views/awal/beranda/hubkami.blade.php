@extends('awal.template.app')
@section('title', 'Hubungi Kami - LAM-PTKes')
@section('content')

	<div class="section-empty">
        <div class="container content">
            <div class="row">
                <div class="col-md-8 col-center text-center">
                	@foreach($tentangs as $tentang)
	                   
	                    <iframe src="{!! $tentang->link !!}" width="750" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

	                    <hr class="space" />
	                    <h2 class="">{{ $tentang->ntentang }}</h2>
	                    
	                    <hr class="space s" />
	               		{!! str_replace('Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan Indonesia', 'LEMBAGA AKREDITASI MANDIRI PENDIDIKAN TINGGI KESEHATAN INDONESIA <br>(INDONESIAN ACCREDITATION AGENCY FOR HIGHER EDUCATION IN HEALTH)', $tentang->alamat ) !!}
							<span>
	                        	<i class="fa fa-phone"></i>
	                        	{{ $tentang->tlp }}
                        	</span>
	                        <hr />
	                        <span>
	                        	<a href="mailto:sekretariat@lamptkes.org?subject=feedback" "email me">
                                    <i class="fa fa-envelope"></i>
                                    {{ $tentang->email }}      
                                </a>
	                        </span>
	                        <hr />
	                        <span>
	                        	<i class="fa fa-calendar"></i>
	                        	{{ $tentang->jam_kerja }}
	                        </span>	               	
					@endforeach
                    <hr class="space m" />
                    




                </div>
            </div>
        </div>
    </div>

@endsection