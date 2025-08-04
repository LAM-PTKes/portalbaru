@extends('awal.template.app')
@section('title', 'Unduhan')
@section('content')

	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>File Unduhan</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">File Unduhan</li>
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
                                <th>File Unduh</th>
                                <th>Deskripsi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($unduhans as $v)
                                <tr>
                                    <td align="">
                                        {{ $no++ }}
                                    </td>
                                       <td>
                                        <a href="{{ route('secure.document.folder', ['folder' => 'unduhan', 'filename' => $v->nama_file]) }}" target="blank">
                                            <button type="button" class="anima-button btn-sm btn">
                                                <i class="fa fa-download"></i>
                                                {{ $v->judul }}
                                            </button>
                                        </a>
                                    </td>
                                    <td align="">
                                        {!! $v->deskripsi !!}
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
