@extends('awal.template.app')
@section('title', 'Database Proses Akreditasi - LAM-PTKes')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Prodi Dalam Proses Akreditasi LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Proses Akreditasi</li>
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
                        <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                               	<th>No</th>
								<th>Perguruan Tinggi</th>
								<th>Program Studi</th>
								<th>Jenjang</th>
								{{-- <th>Tanggal Pengajuan</th> --}}
								<th>Status Proses</th>
								<th>Rumpun Ilmu</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $k => $v)
                                    @if(empty($v))
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td>{{ strtoupper($v['NAMA_PT']) }}</td>
                                            <td>{{ strtoupper($v['NAMA_PS']) }}</td>
                                            <td align="center">{{ strtoupper($v['JENJANG_PS']) }}</td>
                                            <td align="center">{{ strtoupper($v['STATUS_PROSES']) }}</td>
                                            <td align="center">{{ strtoupper($v['RUMPUN_ILMU']) }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>

@endsection	