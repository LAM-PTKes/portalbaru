@extends('admin.template.app')
@section('title')
    Balasan Saran
@endsection
@section('content')

<script type="text/javascript">
    $(document).ready(function(){
            $('#checkbox').on('change', function(){
                $('#password').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
            });
        });

    $(document).ready(function(){
            $("#example-modal-alert").modal('show');

        });
    
</script>

    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"> Pesan</a></li>
            <li class="breadcrumb-item">Balasan Saran</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Balasan Saran: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Balasan Saran</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @include('admin.template.partials._alerts')

                            <br><br> 
                            
                            <form method="post" action="{{ route('saran.update', $saran) }}" class="was-validated" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}


                                <div class="form-group">
                                    <label class="form-label" for="nama">Nama Pengirim</label>
                                    <input type="text" name="nama" id="nama" value="{{ $saran->nama }}" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">Email Pengirim</label>
                                    <input type="email" name="email" id="email" value="{{ $saran->email }}" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="institusi">Institusi</label>
                                    <input type="text" name="institusi" id="institusi" value="{{ $saran->institusi }}" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="tlp">No Telp</label>
                                    <input type="number" autocomplete="off" name="tlp" id="tlp" value="{{ $saran->tlp }}" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control is-valid" required="" readonly="" rows="10">{{ $saran->alamat }}</textarea>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="saran">Saran</label>
                                    <textarea name="saran" id="saran" class="form-control is-valid" required="" readonly="" rows="10">{{ $saran->saran }}</textarea>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="saran">Keluhan</label>
                                    <textarea name="keluhan" id="keluhan" class="form-control is-valid" required="" readonly="" rows="10">{{ $saran->keluhan }}</textarea>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="balasan">Balasan Saran</label>
                                    <textarea name="balasan" id="balasan" class="form-control is-valid js-summernote" required="">{{ $saran->balasan }}</textarea>
                                    <div class="invalid-feedback"><i class="fas fa-hand-point-up fa-2x"></i>   Wajib Di isi</div>
                                </div>

                                <center>
                                    <a href="{{ route('saran') }}" title="">
                                        <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Kembali">
                                            <i class="fas fa-reply mr-1"></i>Back
                                        </button>
                                    </a>

                                    <button type="submit" class="btn btn-outline-success" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Simpan">
                                        Update  <i class="fas fa-share mr-1"></i>
                                    </button>
                                </center>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection