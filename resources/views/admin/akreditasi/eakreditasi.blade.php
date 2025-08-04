@extends('admin.template.app')
@section('title')
    Edit Hasil Akreditasi
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
            <li class="breadcrumb-item"><a href="javascript:void(0);"> Hasil Akreditasi</a></li>
            <li class="breadcrumb-item">Edit Hasil Akreditasi</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Edit Hasil Akreditasi: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Edit Hasil Akreditasi</i></span>
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
                            
                            <form method="post" action="{{ route('akreditasi.update', $hasil) }}" class="was-validated" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                
                                <div class="form-group">
                                    <label class="form-label" for="kode_pt">Kode PT</label>
                                    <input type="text" name="kode_pt" value="{{ $hasil->kode_pt }}" id="kode_pt" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="kode_ps">Kode PS</label>
                                    <input type="text" name="kode_ps" value="{{ $hasil->kode_ps }}" id="kode_ps" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="nama_pt">Nama PT</label>
                                    <input type="text" name="nama_pt" value="{{ strtoupper($hasil->nama_pt) }}" id="nama_pt" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="nama_ps">Nama PS</label>
                                    <input type="text" name="nama_ps" value="{{ strtoupper($hasil->nama_ps) }}" id="nama_ps" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="jenjang">Jenjang</label>
                                    <input type="text" name="jenjang" value="{{ strtoupper($hasil->jenjang) }}" id="jenjang" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="no_sk">No SK</label>
                                    <input type="text" name="no_sk" value="{{ $hasil->no_sk }}" id="no_sk" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="peringkat_akademis">Peringkat Akademis</label>
                                    <input type="text" name="peringkat_akademis" value="{{ strtoupper($hasil->peringkat_akademis) }}" id="peringkat_akademis" class="form-control is-valid" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="peringkat_profesi">Peringkat Profesi</label>
                                    <input type="text" name="peringkat_profesi" value="{{ strtoupper($hasil->peringkat_profesi) }}" id="peringkat_profesi" class="form-control is-valid" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="peringkat_spesialis">Peringkat Spesialis</label>
                                    <input type="text" name="peringkat_spesialis" value="{{ strtoupper($hasil->peringkat_spesialis) }}" id="peringkat_spesialis" class="form-control is-valid" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="datepicker">Tanggal Kadaluarsa</label>
                                    <div class="input-group">
                                        <input type="text" autocomplete="off" name="tgl_kadaluarsa" class="form-control is-valid" value="{{ date('d-m-Y', strtotime($hasil->tgl_kadaluarsa)) }}" placeholder="dd-mm-yyyy" id="datepicker" required="">
                                        <div class="input-group-append">
                                            <span class="input-group-text fs-xl">
                                                <i class="fal fa-calendar-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="thn_sk">Tahun SK</label>
                                    <input type="text" name="thn_sk" value="{{ $hasil->thn_sk }}" id="thn_sk" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="sidang">Sidang Ke</label>
                                    <input type="text" name="sidang" value="{{ $hasil->sidang }}" id="sidang" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="status_kadaluarsa">Status Kadaluarsa</label>
                                    <input type="text" name="status_kadaluarsa" value="{{ strtoupper($hasil->status_kadaluarsa) }}" id="status_kadaluarsa" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="rumpun_ilmu">Rumpun ILmu</label>
                                    <input type="text" name="rumpun_ilmu" value="{{ strtoupper($hasil->rumpun_ilmu ) }}" id="rumpun_ilmu" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="id_sms">Id SMS</label>
                                    <input type="text" name="id_sms" value="{{ $hasil->id_sms }}" id="id_sms" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="sk_akreditasi_id">Id SK Akreditasi</label>
                                    <input type="text" name="sk_akreditasi_id" value="{{ $hasil->sk_akreditasi_id }}" id="sk_akreditasi_id" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="is_show">Status Publikasi</label>
                                    <select name="is_show" id="is_show" class="form-control is-valid" required="">
                                        <option @if($hasil->is_show == '1') value="1" selected="" @else value="1" @endif>Publish</option>
                                        <option @if($hasil->is_show == '0') value="0" selected="" @else value="0" @endif>Unpublish</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <center>

                                   @if($hasil->is_show == '1')
                                        <a href="{{ route('akreditasi') }}" title="">
                                            <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Kembali">
                                                <i class="fas fa-reply mr-1"></i>Back
                                            </button>
                                        </a>
                                   @else
                                        <a href="{{ route('unpublishhasilakre') }}" title="">
                                            <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Kembali">
                                                <i class="fas fa-reply mr-1"></i>Back
                                            </button>
                                        </a>
                                   @endif

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