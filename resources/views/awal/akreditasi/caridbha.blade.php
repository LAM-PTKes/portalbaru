@extends('awal.template.app')
@section('title', 'Database Hasil Akreditasi - LAM-PTKes')
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
                        <h1>Hasil Akreditasi LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Hasil Akreditasi LAM-PTKes</li>
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
                            <h2>Hasil Pencarian</h2>
                    		<h4>
                                @if(!empty($cari2)) 
                                    Nama PT : <b><i>{{ $cari2 }}</i></b> <br> 
                                @endif
                                @if(!empty($cari1))
                                    Nama PS : <b><i>{{ $cari1 }}</i></b> <br>
                                @endif 
                                @if(!empty($cari3))
                                    Jenjang : <b><i>{{ $cari3 }}</i></b> <br>
                                @endif 
                                @if(!empty($cari5) && $cari5 != 'all')
                                    Status Akreditasi : 
                                    @if($cari5 == '1') <b><i>Belum Daluwarsa</i></b> 
                                    @elseif($cari5 == '0')  <b><i>Daluwarsa</i></b> 
                                    @endif <br>
                                @endif
                                @if(!empty($cari6))
                                    Tahun Berakhir SK : <b><i>{{ $cari6 }}</i></b>
                                @endif  
                                <br>
                                @if(count($hasil) == 0)
                                    <b>
                                        <i>Data Yang Anda Cari Tidak Ditemukan</i>
                                    </b>
                                @endif
                            </h4>
                            	<br>
                    	</div>
                    	<center>
                            @if($cari5 != 'all')
    							<a href="{{ route('alldha') }}">
    								<button type="button" name="ok" class="anima-button btn-sm btn">
    									<i class="fa fa-eye" aria-hidden="true"></i> 
    										Tampilkan Semua
    								</button>
    							</a>
                            @endif
						</center>

                        <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
								<th>Jenjang</th>
								<th>Perguruan Tinggi</th>
								<th>Program Studi</th>
                                <th>Peringkat Akreditasi:</th>
								<th>Nomor SK</th>
								<th>Tahun SK:</th>
								<th>Tanggal Daluwarsa:</th>
								<th>Status Daluwarsa:</th>
                                <th>History Akreditasi:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hasil as $v)
								<tr>
									<td>{{ $no++ }}</td>
									<td>{{ $v->jenjang }}</td>
									<td>{{ $v->nama_pt }}</td>
									<td align="center">{{ $v->nama_ps }}</td>
                                    <td align="center">
                                        {{ $v->peringkat_akademis}}
                                        {{ $v->peringkat_profesi}}
                                        {{ $v->peringkat_spesialis}}
                                    </td>
									<td>{{ $v->no_sk }}</td>
									<td>{{ $v->thn_sk}}</td>
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
                                  	<td>
                                        
                                        <button type="button" class="anima-button btn-sm btn" data-toggle="modal" onclick="dataRiwayat('{{ $v->kode_pt }},{{ $v->kode_ps }}')" data-target="#myModal">
                                            <i class="fa fa-eye" aria-hidden="true"></i> 
                                                Lihat Riwayat
                                        </button>
                					   {{-- <button type="button" class="btn-link" data-toggle="modal" data-target="#myModal">History Akreditasi (Lihat Disini)</button> --}}
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


<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg" style="width:80%;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">History Akreditasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div id="txtHint" class="table-responsive">
                
            </div>

            {{-- <table id="txtHint" class="table table-striped">
                <thead>
                    <tr>
                        <th>Perguruan Tinggi</th>
                        <th>Program Studi</th>
                        <th>Jenjang</th>
                        <th>Nomor SK</th>
                        <th>Tahun SK</th>
                        <th>Tanggal Daluwarsa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table> --}}

        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
{{-- @endforeach --}}
@endsection	
