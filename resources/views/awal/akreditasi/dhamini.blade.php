@extends('awal.template.app')
@section('title', 'Hasil Akreditasi Prodi Baru - LAM-PTKes')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Hasil Akreditasi Prodi Baru</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Hasil Akreditasi Prodi Baru</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <div class="section-empty section-item">
        <div class="container content">
             <div class="row">
                <div class="col-12">
                    <form action="{{ route('cdhamini') }}" method="get">
		                {{ csrf_field() }}
		                {{ method_field('patch') }}
			                <div class="form-row">
			                    <div class="form-group col-md-6">
			                    <label for="exampleFormControlSelect1">Jenjang</label>
			                    <select name="jenjang" class="form-control" id="exampleFormControlSelect1">
			                        <option selected="" value="">--Semua--</option>
			                        <option value="diploma tiga">DIPLOMA TIGA</option>
			                        <option value="diploma empat">DIPLOMA EMPAT</option>
			                        <option value="sarjana">SARJANA</option>
			                        <option value="profesi">PROFESI</option>
			                        <option value="profesi ners">PROFESI NERS</option>
			                        <option value="magister">MAGISTER</option>
			                        <option value="spesialis">SPESIALIS</option>
			                        <option value="doktor">DOKTOR</option>
			                    </select>
			                </div>
			                    <div class="form-group col-md-6">
			                        <label for="nama_pt">Nama Perguruan Tinggi</label>
			                        <input type="text" name='nama_pt' class="form-control" id="nama_pt" placeholder="Nama Perguruan Tinggi">
			                    </div>
			                </div>
			                <div class="form-row">
			                    <div class="form-group col-md-6">
			                        <label for="nama_ps">Nama Program Studi</label>
			                        <input type="text" name="nama_ps" class="form-control" id="nama_ps" placeholder="Nama Program Studi">
			                    </div>
			                    <div class="form-group col-md-6">
				                    <label for="exampleFormControlSelect1">Tahun Kadaluarsa SK</label>
				                    <select class="form-control" name="thn" id="exampleFormControlSelect1">
				                        <option value="" selected>--Lainnya--</option>
				                        @for($i=date('Y')-5; $i<date('Y')+10; $i++){
				                        <option value="{{ $i }}">{{ $i }}</option>
				                        }
				                        @endfor
				                    </select>
				                </div>
			                </div>
			                <div class="form-row">
			                    <div class="form-group col-md-12">
			                        <label for="inputPassword4">Status Akreditasi</label>
			                        <div class="form-check">
			                            <input id="radio-2" class="radio-style" name="cek" type="radio" value="masih berlaku">
			                            <label for="radio-2" class="radio-style-2-label radio-small">
			                                Tampilkan Semuanya
			                            </label>
			                        </div>
			                        <div class="form-check">
			                            <input id="radio-1" class="radio-style" name="cek" type="radio" value="masih berlaku">
			                            <label for="radio-1" class="radio-style-1-label radio-small">
			                                Belum Kadaluarsa
			                            </label>
			                        </div>
			                    </div>
			                </div>
			                <center>
			                    {{-- <a href="{{ route('kdluarsa') }}">
			                        <button type="button" name="ok" class="btn btn-danger">
			                            <i class="fa fa-eye" aria-hidden="true"></i> Tidak Terakreditasi
			                        </button>
			                    </a> --}}
			                    <button type="submit" name="ok" class="anima-button btn-sm btn">
			                        <i class="fa fa-search" aria-hidden="true"></i> Cari Data Hasil Akreditasi Prodi Baru
			                    </button>
			                </center>
            		</form>
                </div>
            </div> <!-- end row -->
        </div>
    </div>


@endsection
