@extends('awal.template.app')
@section('title', 'Hasil Akreditasi Prodi Baru - LAM-PTKes')
@section('content')
<script type="text/javascript">

    // function dataRiwayat(str) {
    //     console.log(str);
    //       $.ajax({
    //         url : "{{ route('riwayat') }}?q="+str,
    //         type : "GET",
    //         dataType : 'json',
    //         // data : {'_token' : csrf_token},
    //         success : function(data) {
    //             console.log(data);
    //             $('#txtHint tbody').append("<tr><td>" + data[0]['nama_pt'] + "</td><td>" + data.nama_ps + "</td><td>" + data.jenjang + "</td><td>"+ data.no_sk +"</td><td>"+ data.thn_sk + "</td><td>" +data.tgl_kadaluarsa+"</td><td>"+data.status_kadaluarsa+"</td></tr>");
    //         },
    //         error : function() {
    //         console.log('error');
    //         }
    //     });
    // }

    function dataRiwayat(str) {
        console.log(str);
          $.ajax({
            url : "{{ route('riwayat') }}?q="+str,
            type : "GET",
            // data : {'_token' : csrf_token},
            success : function(data) {
                console.log(data);
                // if (data[1] == '0') {
                //     // alert('Data Tidak Ditemukan');
                //     // Swal.fire("Ooops!", "Data tidak ditemukan.", "success");
                // }else{

                //     // Swal.fire("Berhasil!", "Data Berhasil Ditemukan!", "success");
                // // document.getElementById("txtHint").innerHTML=data[0];

                    $("#txtHint").html(data);
                // }
            }
        });
    }


    </script>
<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Hasil Akreditasi Prodi Baru</h1>
                    </div>
                </div>
                <div class="col-md-3">
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
                    <div class="card-box table-responsive">
                    	<div class="col-12">
                    	<h4>{{ $cari1 }} {{ $cari2 }}  {{ $cari3 }} {{ $cari5 }} {{ $cari6 }}</h4>
                        <br>
                    	</div>
                    	<center>
			<!-- <a href="{{ route('alldhamini') }}">
			<button type="button" name="ok" class="anima-button btn-sm btn">
			<i class="fa fa-eye" aria-hidden="true"></i>
			Tampilkan Semua
			</button>
			</a> -->
			</center>

                        <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                             <th>No</th>
			     <th>Jenjang</th>
			     <th>Perguruan Tinggi</th>
			     <th>Program Studi</th>
			     <th>Nomor SK</th>
			     <th>Tahun SK:</th>
                	     <th>Kategori:</th>
			     <th>Peringkat Akreditasi:</th>
			     <th>Tanggal Daluwarsa:</th>
			     <th>Status Daluwarsa:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hasil as $v)
				<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $v->jenjang }}</td>
				<td>{{ $v->nama_pt }}</td>
				<td>{{ $v->nama_ps }}</td>
				<td>{{ $v->no_sk }}</td>
				<td>{{ $v->thn_sk}}</td>
                  		<td>{{ $v->kategori}}</td>
				<td>
				{{ $v->peringkat}}
				</td>
				<td>
                                        @if($v->tgl_kadaluarsa)
                                            {{ str_replace($bulan, $ganti, date('d F Y', strtotime($v->tgl_kadaluarsa))) }}
                                        @else
                                            -
                                        @endif
                                </td>
				<td>
                                        @if($v->tgl_kadaluarsa < date('Y-m-d'))
                                            DALUWARSA
                                        @elseif(empty($v->status_kadaluarsa))
                                            TIDAK TERAKREDITASI
                                        @else
                                            {{ $v->status_kadaluarsa }}
                                        @endif
                                </td>
                		</tr>
				@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>


{{-- @endforeach --}}
@endsection
