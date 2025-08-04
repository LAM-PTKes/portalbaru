@extends('awal.template.app')
@section('title', 'Survei - LAM-PTKes')
@section('content')

<script type="text/javascript">

    $(document).ready(function(){
        
        $('#tempo').click(function() { 
            // console.log($(this).val());
            var str = $(this).val();
            $.ajax({
                    url : "{{ route('lsurvei') }}?q="+str,
                    type : "GET",
                    // data : {'_token' : csrf_token},
                    success : function(data) {
                        console.log(data);
                        $('#ditempo').html(data);
                    }
                });

        });

    });

</script>

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Daftar Survei LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Survei</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty section-item">
        <div class="container content">
            @foreach($survey as $srv)
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-texts">
                                <li><b>Tujuan Survei</b>{{ $srv->tujuan }}</li>
                                <li><b>Metode Survei</b>{{ $srv->metode }}</li>
                                <li><b>Responden</b>{{ $srv->responden }}</li>
                                <li>
                                    <b>Waktu Pelaksanaan</b>
                                    {{ str_replace($bulan, $ganti, date('d F Y', strtotime($srv->waktu_pelaksanaan))) }}
                                </li>
                                <li>
                                    <b>views</b> 
                                    <b id="ditempo"> 
                                        @if(empty($srv->views))
                                            0
                                        @else
                                            {{ $srv->views }}
                                        @endif 
                                    </b> 
                                </li>
                            </ul>
                            <hr class="space s">
                            <button type="button" class="anima-button btn btn-border btn-sm" id="tempo" value="{{ $srv->id }}">   
                                <a href="{{ $srv->link }}" target="blank" ><i class="fa fa-paper-plane-o"></i>Klik Untuk Partisipasi</a>
                            </button>

                        </div>
                        <div class="col-md-8">
                            <p>
                                Ayo Partisipasi dalam survei berikut : 
                            </p>
                            <p class="block-quote quote-1">
                                {{ $srv->judul }}

                            </p>
                            <hr class="space m">

                            <div class="btn-group social-group btn-group-icons  ">
                                <p>
                                    Share : 
                                </p>
                                <a target="_blank" href="#" data-social="share-facebook"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="#" data-social="share-twitter"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" href="#" data-social="share-instagram"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="c">
            @endforeach

        </div>
    </div>

@endsection