@extends('awal.template.app')
@section('title', 'Unduh Instrumen APS Kualitaif')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Unduh Instrumen APS Kualitatif</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Instrumen APS Kualitatif</li>
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
                                <th>Deskripsi</th>
				                <th>Tanggal Unggah</th>
                                <th>Instrumen APS Kualitatif</th>
                                <th>Jenjang</th>
                                <th>Bidang Ilmu</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($unduhans as $v => $unduhan)
                                    <tr>
                                        <td align="center">
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            {!! $unduhan->deskripsi !!}
                                        </td>
					                    <td>
                                            {{ $unduhan->updated_at->format('d/m/Y') }}
                                        </td>
                                        <td align="">
                                            <a href="{{ route('secure.document.folder', ['folder' => 'unduhan', 'filename' => $unduhan->nama_file]) }}" target="blank">
                                                <button type="button" class="anima-button btn-sm btn">
                                                    <i class="fa fa-download"></i>
                                                    {{ $unduhan->judul }}
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            {{ $unduhan->jenjang }}
                                        </td>
                                        <td>
                                            {{ $unduhan->bidang_ilmu }}
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

@endsection
