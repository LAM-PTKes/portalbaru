@extends('awal.template.appen')
@section('title', 'Medical Accreditation Results - IAAHEH')
@section('content')

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Medical Accreditation Results</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/en') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Medical Accreditation Results</li>
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
                            
                        </div>

                        <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Level</th>
                                <th>Institution</th>
                                <th>Study Program</th>
                                <th>Decree #</th>
                                <th>Year of Issue</th>
                                <th>Rank of Accreditation:</th>
                                <th>Expiration Date:</th>
                                <th>Expiration Status:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hasil as $v)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>Profession Education</td>
                                    <td>{{ $v->nama_pt }}</td>
                                    <td>Medical Doctor</td>
                                    <td>{{ $v->no_sk }}</td>
                                    <td>{{ $v->thn_sk}}</td>
                                    <td>
                                        {{ str_replace($peringkat, $ganti, $v->peringkat_akademis)}}
                                        {{ str_replace($peringkat, $ganti, $v->peringkat_profesi)}}
                                        {{ str_replace($peringkat, $ganti, $v->peringkat_spesialis)}}
                                        
                                    </td>
                                    <td>
                                        @if($v->tgl_kadaluarsa)
                                            {{ date('d-M-Y', strtotime($v->tgl_kadaluarsa)) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($v->tgl_kadaluarsa < date('Y-m-d'))
                                            {{ str_replace($statuscari, $status_ganti, $v->status_kadaluarsa.' (Study Program is in The Process of Accreditation, One Year Extension of The Decree is Provided and Valid Till The New Decree is Issued)') }}
                                        @elseif(date('Y', strtotime($v->tgl_kadaluarsa))-1 == $v->thn_sk )
                                            {{ str_replace($statuscari, $status_ganti, $v->status_kadaluarsa.' (final decree will be given after on-site visit)') }}
                                        @else
                                            {{ str_replace($statuscari, $status_ganti, $v->status_kadaluarsa) }}
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

@endsection 