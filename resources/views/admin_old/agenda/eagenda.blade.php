@extends('admin.template.app')
@section('title')
    Edit Agenda Kegiatan LAM-PTKes
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
            <li class="breadcrumb-item"><a href="javascript:void(0);"> Agenda Kegiatan</a></li>
            <li class="breadcrumb-item">Edit Agenda Kegiatan LAM-PTKes</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Edit Agenda Kegiatan LAM-PTKes: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Edit Agenda Kegiatan LAM-PTKes</i></span>
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
                            
                            <form method="post" action="{{ route('agenda.update', $agn) }}" class="was-validated" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}


                                <div class="form-group">
                                    <label class="form-label" for="nagenda">Agenda Kegiatan</label>
                                    <input type="text" name="nagenda" value="{{ $agn->nagenda }}" id="nagenda" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="penyelenggara">Penyelenggara</label>
                                    <input type="text" name="penyelenggara" value="{{ $agn->penyelenggara }}" id="penyelenggara" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" value="{{ $agn->lokasi }}" id="lokasi" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="kontak">Kontak</label>
                                    <input type="text" name="kontak" value="{{ $agn->waktu_kegiatan }}" id="kontak" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="website">Website</label>
                                    <input type="text" name="website" value="{{ $agn->website }}" id="website" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="kota">Kota</label>
                                    <input type="text" name="kota" value="{{ $agn->kota }}" id="kota" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="datepicker">Tanggal Kegiatan</label>
                                    <div class="input-group">
                                        <input type="text" autocomplete="off" name="tanggal_kegiatan" value="{{ date('d-m-Y', strtotime($agn->tanggal_kegiatan)) }}" class="form-control is-valid" placeholder="dd-mm-yyyy" id="datepicker" required="">
                                        <div class="input-group-append">
                                            <span class="input-group-text fs-xl">
                                                <i class="fal fa-calendar-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="waktu_kegiatan">Waktu Kegiatan</label>
                                    <input type="text" name="waktu_kegiatan" value="{{ $agn->waktu_kegiatan }}" id="waktu_kegiatan" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="katbahasa">Kategori Bahasa</label>
                                    <select name="katbahasa" id="katbahasa" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        @foreach($katbhs as $bhs)
                                            <option @if($agn->katbahasa_id == $bhs->id)
                                                value="{{ $bhs->id }}" selected @else value="{{ $bhs->id }}" @endif>{{ $bhs->namakbhs }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control is-valid js-summernote" required="">{{ $agn->deskripsi }}</textarea>
                                    <div class="invalid-feedback"><i class="fas fa-hand-point-up fa-2x"></i>   Wajib Di isi</div>
                                </div>

                                <center>
                                    <a href="{{ route('agenda') }}" title="">
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