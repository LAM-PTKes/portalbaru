@extends('admin.template.app')
@section('title')
    Edit Survey
@endsection
@section('content')
<script type="text/javascript">
    $(document).ready(function(){
            $("#example-modal-alert").modal('show');

        });
    
    // $(document).ready(function(){
    //     $('#myForm').on('submit', function(e) {
          
    //       if($('#ringkasan_hasil_survey').summernote('isEmpty')) {
    //         // console.log('contents is empty, fill it!');
    //         $('#feedbackabs').show();
    //         // cancel submit
    //         e.preventDefault();
    //       }
    //       else {
    //          $('#feedbackabs').hide();
    //       }
    //     })
    // });
</script>

    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"> Survey</a></li>
            <li class="breadcrumb-item">Edit Survey</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Edit Survey: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Edit Survey</i></span>
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
                            
                            <form method="post" action="{{ route('survey.update', $srv) }}" class="was-validated" enctype="multipart/form-data" id="myForm">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="form-group">
                                    <label class="form-label" for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" value="{{ $srv->judul }}" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="tujuan">Tujuan</label>
                                    <input type="text" name="tujuan" id="tujuan" class="form-control is-valid" required="" value="{{ $srv->tujuan }}">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="metode">Metode</label>
                                    <input type="text" name="metode" id="metode" class="form-control is-valid" required="" value="{{ $srv->metode }}">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="responden">Responden</label>
                                    <input type="text" name="responden" id="responden" class="form-control is-valid" required="" value="{{ $srv->responden }}">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="katbahasa">Kategori Bahasa</label>
                                    <select name="katbahasa_id" id="katbahasa_id" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        @foreach($katbhs as $bhs)
                                            <option @if( $srv->katbahasa_id == $bhs->id) value="{{ $bhs->id }}" selected="" @else value="{{ $bhs->id }}" @endif>{{ $bhs->namakbhs }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="datepicker">Waktu Pelaksanaan</label>
                                    <input type="text" name="waktu_pelaksanaan" autocomplete="off" id="datepicker" class="form-control is-valid" required value="{{ date('d-m-Y', strtotime($srv->waktu_pelaksanaan )) }}">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="datepicker-1">Waktu Penutupan</label>
                                    <input type="text" name="tgl_tutup" autocomplete="off" id="datepicker-1" class="form-control is-valid" required value="{{ date('d-m-Y', strtotime($srv->tgl_tutup )) }}">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="publikasi">Status Publikasi</label>
                                    <select name="publikasi" id="publikasi" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        <option @if($srv->publikasi == 'Ya') value="Ya" selected="" @else value="Ya" @endif>Publish</option>
                                        <option @if($srv->publikasi == 'Tidak') value="Tidak" selected="" @else value="Tidak" @endif>Unpublish</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="link">Link Kuesioner</label>
                                    <textarea name="link" id="link" class="form-control is-valid" required="" rows="5">{{ $srv->link }}</textarea>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <center>
                                    <a href="{{ route('survey') }}" title="">
                                        <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Kembali">
                                            <i class="fas fa-reply mr-1"></i>Back
                                        </button>
                                    </a>

                                    <button type="submit" class="btn btn-outline-success" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Submit" id='tunda'>
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
