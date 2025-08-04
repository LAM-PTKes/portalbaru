@extends('awal.template.appen')
@section('title', 'Directory of Accreditation Results- IAAHEH')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Accreditation Results</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Accreditation Results</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <div class="section-empty section-item">
        <div class="container content">
             <div class="row">
                <div class="col-12">
                    <form action="{{ route('cdhaen') }}" method="get">
		                {{ csrf_field() }}
		                {{ method_field('patch') }}
			                <div class="form-row">
			                    <div class="form-group col-md-6">
			                    <label for="exampleFormControlSelect1">Level</label>
			                    <select name="jenjang" class="form-control" id="exampleFormControlSelect1">
			                        <option selected="" value="">--All--</option>
			                        <option value="diploma tiga">DIPLOMA III</option>
			                        <option value="diploma empat">DIPLOMA IV</option>
			                        <option value="sarjana">UNDERGRADUATE</option>
			                        <option value="profesi">PROFESSIONAL</option>
			                        <option value="profesi ners">NURSE PROFESSIONAL</option>
			                        <option value="magister">MASTER</option>
			                        <option value="spesialis">SPECIALIST</option>
			                        <option value="doktor">DOCTORAL</option>
			                    </select>
			                </div>
			                    <div class="form-group col-md-6">
			                        <label for="nama_pt">Name of Institution</label>
			                        <input type="text" name='nama_pt' class="form-control" id="nama_pt" placeholder="Name of Institution">
			                    </div>
			                </div>
			                <div class="form-row">
			                    <div class="form-group col-md-6">
			                        <label for="nama_ps">Name of Study Program</label>
			                        <input type="text" name="nama_ps" class="form-control" id="nama_ps" placeholder="Name of Study Program">
			                    </div>
			                    <div class="form-group col-md-6">
				                    <label for="exampleFormControlSelect1">Decree Expiration Year</label>
				                    <select class="form-control" name="thn" id="exampleFormControlSelect1">
				                        <option value="" selected>--Others--</option>
				                        @for($i=date('Y')-5; $i<date('Y')+10; $i++){
				                        <option value="{{ $i }}">{{ $i }}</option>
				                        }
				                        @endfor
				                    </select>
				                </div>
			                </div>
			                <div class="form-row">
			                    <div class="form-group col-md-12">
			                        <label for="inputPassword4">Accreditation Status</label>
			                        <div class="form-check">
			                            <input id="radio-2" class="radio-style" name="cek" type="radio" value="masih berlaku">
			                            <label for="radio-2" class="radio-style-2-label radio-small">
			                                Show All
			                            </label>
			                        </div>
			                        <div class="form-check">
			                            <input id="radio-1" class="radio-style" name="cek" type="radio" value="masih berlaku">
			                            <label for="radio-1" class="radio-style-1-label radio-small">
			                                Not Expired Yet
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
			                        <i class="fa fa-search" aria-hidden="true"></i> Search
			                    </button>
			                </center>
            		</form>
                </div>
            </div> <!-- end row -->
        </div>
    </div>


@endsection	