@extends('awal.template.appen')
@section('title', 'Assessment Team IAAHEH')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Assessment Team IAAHEH</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li>Pages</a></li>
                        <li class="active">Assessment Team</li>
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
                            <li class="active"><a href="#" style="color: black; font-size: 15px;"><b>Assesor Assessment Team</b></a></li>
                            <li><a href="#" style="color: black; font-size: 15px;"><b>ValidatorAssessment Team</b></a></li>
                            {{-- <li><b>Assessment Team Majelis</b></li> --}}
                        </ul>
                        <div class="panel active">
                           <div class="card-box table-responsive">
                                <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Name</center></th>
                                        <th><center>Institution</center></th>
                                        <th><center>Assessment Team</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($result as $k => $v)
                                            <tr>
                                                <td align="center">{{ $no++ }}</td>
                                                <td align="left">
                                                    @if(is_null($v['NAMA_TANPA_GELAR']))
                                                        {{  str_replace($gelar, '', $v['NAMA'])  }}
                                                    @else
                                                        {{  str_replace($gelar, '', strtoupper($v['NAMA_TANPA_GELAR'])) }} 
                                                    @endif
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
                                <table id="key-table2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Name</center></th>
                                        <th><center>Institution</center></th>
                                        <th><center>Assessment Team</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($result2 as $k => $v)
                                            <tr>
                                                <td align="center">{{ $no2++ }}</td>
                                                <td align="left">
                                                    @if(is_null($v['NAMA_TANPA_GELAR']))
                                                        {{  str_replace($gelar, '', $v['NAMA'])  }}
                                                    @else
                                                        {{  str_replace($gelar, '', strtoupper($v['NAMA_TANPA_GELAR'])) }} 
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