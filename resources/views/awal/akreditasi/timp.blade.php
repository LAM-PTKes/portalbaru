@extends('awal.template.app')
@section('title', 'Tim Penilai LAM-PTKes')
@section('content')

    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Tim Penilai LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li>Halaman</a></li>
                        <li class="active">Tim Penilai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty section-item">
        <div class="container content">
            <div class="row">
                <div class="col-12">
                    <div class="tab-box" id="tab-classic" data-tab-anima="fade-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#" style="color: black; font-size: 15px;"><b>Tim Penilai
                                        Assesor</b></a></li>
                            <li><a href="#" style="color: black; font-size: 15px;"><b>Tim Penilai Validator</b></a>
                            </li>
                            {{-- <li><b>Tim Penilai Majelis</b></li> --}}
                        </ul>
                        <div class="panel active">
                            <div class="card-box table-responsive">
                                <table id="key-table" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>Nama Lengkap</center>
                                            </th>
                                            <th>
                                                <center>Institusi Asal</center>
                                            </th>
                                            <th>
                                                <center>Tim Penilai</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $k => $v)
                                            <tr>
                                                <td align="center">{{ $no++ }}</td>
                                                <td align="left">
                                                    {{-- @if (is_null($v['NAMA_TANPA_GELAR']))
                                                        {{  str_replace($gelar, '', $v['NAMA'])  }}
                                                    @else
                                                        {{  str_replace($gelar, '', strtoupper($v['NAMA_TANPA_GELAR'])) }} 
                                                    @endif --}}
                                                    {{ strtoupper($v['NAMA_TANPA_GELAR']) }}
                                                </td>
                                                <td align="left">{{ strtoupper($v['INSTITUSIASAL']) }}</td>
                                                <td align="center">ASSESOR</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="card-box table-responsive">
                                <table id="key-table2" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>Nama Lengkap</center>
                                            </th>
                                            <th>
                                                <center>Institusi Asal</center>
                                            </th>
                                            <th>
                                                <center>Tim Penilai</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result2 as $k => $v)
                                            <tr>
                                                <td align="center">{{ $no2++ }}</td>
                                                <td align="left">
                                                    @if (is_null($v['NAMA_TANPA_GELAR']))
                                                        {{ str_replace($gelar, '', $v['NAMA']) }}
                                                    @else
                                                        {{ str_replace($gelar, '', strtoupper($v['NAMA_TANPA_GELAR'])) }}
                                                    @endif
                                                </td>
                                                <td align="left">{{ strtoupper($v['INSTITUSIASAL']) }}</td>
                                                <td align="center">VALIDATOR</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- end row -->
        </div>
    </div>

@endsection
