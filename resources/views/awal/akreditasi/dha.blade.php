@extends('awal.template.app')
@section('title', 'Database Hasil Akreditasi - LAM-PTKes')
@section('content')

<script>
	$(document).ready(function(){

		var data = "{{ $lspt }}";
	    var availableTags = data.split('~');
	    // console.log(availableTags);
	    $( "#nama_pt" ).autocomplete({
	      source: availableTags
	    });

		var dt = "{{ $lsps }}";
	    var tg = dt.split('~');
	    console.log(dt);
	    $( "#nama_ps" ).autocomplete({
	      source: tg
	    });

	    $('input[type=radio][name=cek]').change(function() {
		    if (this.value == 'all') {
		        // alert("kabeh");
		        $('#nama_pt').attr('readonly',true);
		        $('#nama_pt').val('');
		        $('#nama_ps').attr('readonly',true);
		        $('#nama_ps').val('');
		        $('#thn').attr('disabled',true);
		        $('#jenjang').attr('disabled',true);
		        $('#jenjang').css({border:'2px solid red', borderRadius:'4px'});
		        $('#thn').css({border:'2px solid red', borderRadius:'4px'});
		        $('#nama_pt').css({border:'2px solid red', borderRadius:'4px'});
		        $('#nama_ps').css({border:'2px solid red', borderRadius:'4px'});

		    }
		    else if (this.value == '1') {
		        $('#nama_pt').attr('readonly',false);
		        $('#nama_ps').attr('readonly',false);
		        $('#thn').attr('disabled',false);
		        $('#jenjang').attr('disabled',false);
		        $('#jenjang').css({border:'2px solid green', borderRadius:'4px'});
		        $('#thn').css({border:'2px solid green', borderRadius:'4px'});
		        $('#nama_pt').css({border:'2px solid green', borderRadius:'4px'});
		        $('#nama_ps').css({border:'2px solid green', borderRadius:'4px'});
		    }
		    else if (this.value == '0') {
		        $('#nama_pt').attr('readonly',false);
		        $('#nama_ps').attr('readonly',false);
		        $('#thn').attr('disabled',false);
		        $('#jenjang').attr('disabled',false);
		        $('#jenjang').css({border:'2px solid green', borderRadius:'4px'});
		        $('#thn').css({border:'2px solid green', borderRadius:'4px'});
		        $('#nama_pt').css({border:'2px solid green', borderRadius:'4px'});
		        $('#nama_ps').css({border:'2px solid green', borderRadius:'4px'});
		    }
		});

	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Database Hasil Akreditasi</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Database Hasil Akreditasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <div class="section-empty section-item">
        <div class="container content">
             <div class="row">
                <div class="col-12">
                    <form action="{{ route('cdha') }}" method="get">
		                {{ csrf_field() }}
		                {{ method_field('patch') }}
			                <div class="form-row">
			                    <div class="form-group col-md-6">
			                    <label for="jenjang">Jenjang</label>
			                    <select name="jenjang" class="form-control" id="jenjang">
			                        <option selected="" value="">--Semua--</option>
			                        <option value="DIPLOMA SATU">DIPLOMA SATU</option>
			                        <option value="DIPLOMA TIGA">DIPLOMA TIGA</option>
			                        <option value="DIPLOMA EMPAT">DIPLOMA EMPAT</option>
			                        <option value="DIPLOMA EMPAT PENDIDIK">DIPLOMA EMPAT PENDIDIK</option>
			                        <option value="SARJANA TERAPAN">SARJANA TERAPAN</option>
			                        <option value="SARJANA">SARJANA</option>
			                        <option value="PENDIDIKAN PROFESI">PENDIDIKAN PROFESI</option>
			                        <option value="PROFESI">PROFESI</option>
			                        <option value="PROFESI NERS">PROFESI NERS</option>
			                        <option value="MAGISTER">MAGISTER</option>
			                        <option value="MAGISTER TERAPAN">MAGISTER TERAPAN</option>
			                        <option value="SPESIALIS">SPESIALIS</option>
			                        <option value="SUB SPESIALIS">SUB SPESIALIS</option>
			                        <option value="DOKTOR">DOKTOR</option>
			                    </select>
			                </div>
			                    <div class="form-group col-md-6">
			                        <label for="nama_pt">Nama Perguruan Tinggi</label>
			                        <input type="text" name="nama_pt" id="nama_pt" class="form-control" placeholder="Nama Perguruan Tinggi">
			                    </div>
			                </div>
			                <div class="form-row">
			                    <div class="form-group col-md-6">
			                        <label for="nama_ps">Nama Program Studi</label>
			                        <input type="text" name="nama_ps" class="form-control" id="nama_ps" placeholder="Nama Program Studi">
			                    </div>
			                    <div class="form-group col-md-6">
				                    <label for="thn">Tahun Daluwarsa SK</label>
				                    {{-- <select class="form-control" name="thn" id="thn">
				                        <option value="" selected>--Lainnya--</option>
				                        @for($i=2020; $i<date('Y')+6; $i++){
				                        <option value="{{ $i }}">{{ $i }}</option>
				                        }
				                        @endfor
				                    </select> --}}
									    <input type="text" class="form-control" id="datepicker" autocomplete="off" name="thn">
									</div>
				                </div>
			                </div>
			                <div class="form-row">
			                    <div class="form-group col-md-12">
			                        <label for="inputPassword4">Status Akreditasi</label>
			                        <div class="form-check">
			                            <input id="radio-1" class="radio-style" name="cek" type="radio" value="1">
			                            <label for="radio-1" class="radio-style-1-label radio-small">
			                                Belum Daluwarsa
			                            </label>
			                        </div>
			                        <div class="form-check">
			                            <input id="radio-2" class="radio-style" name="cek" type="radio" value="0">
			                            <label for="radio-2" class="radio-style-2-label radio-small">
			                                Sudah Daluwarsa
			                            </label>
			                        </div>
			                        <div class="form-check">
			                            <input id="radio-3" class="radio-style" name="cek" type="radio" value="all">
			                            <label for="radio-3" class="radio-style-2-label radio-small">
			                                Tampilkan Semuanya
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
			                        <i class="fa fa-search" aria-hidden="true"></i> Cari Data
			                    </button>
			                </center>
            		</form>
                </div>
            </div> <!-- end row -->
        </div>
    </div>

<script type="text/javascript">
	$("#datepicker").datepicker({
	    format: "yyyy",
	    todayHighlight: true,
     	orientation: "bottom left",
	    autoclose: true,
	    viewMode: "years", 
	    minViewMode: "years"
	});
</script>

@endsection	