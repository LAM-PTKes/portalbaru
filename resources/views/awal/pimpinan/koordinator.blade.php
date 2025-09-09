@extends('awal.template.app')
@section('title', 'Koordinator - LAM-PTKes')
@section('content')
    <style>
        .profil-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .advs-box {
            display: flex;
            flex-direction: column;
            height: 100%;
            background: #fff;
        }

        .advs-box .img-box img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .advs-box .content-box {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
            padding: 10px;
        }

        .advs-box .content-box h4 {
            font-size: 16px;
            font-weight: 600;
            line-height: 1.4em;
            margin-bottom: 5px;
            word-wrap: break-word;
            white-space: normal;
            /* biar teks bisa turun ke bawah */
            overflow: visible;
            /* jangan dipotong */
            text-overflow: unset;
        }

        .advs-box .content-box h5 {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
            line-height: 1.3em;
            white-space: normal;
        }


        .advs-box .content-box hr.e {
            margin-top: auto;
        }
    </style>
    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Koordinator LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Koordinator LAM-PTKes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="section-empty section-item text-center">
        <div class="container content">
            <div class="profil-grid">
                @foreach ($profil as $v)
                    <div class="advs-box" data-anima="scale-up" data-trigger="hover">
                        <a class="img-box">
                            <img class="anima"
                                src="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $v->img]) }}"
                                alt="{{ $v->nama }}" />
                        </a>
                        <div class="content-box">
                            <div>
                                <h4>{{ $v->nama }}</h4>
                                <h5>{{ $v->jabatan->jabatan ?? '-' }}</h5>
                            </div>
                            <hr class="e" />
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
