@extends('admin.template.app')
@section('title')
    Edit Newsletter
@endsection
@section('content')
<script type="text/javascript">
    $(document).ready(function(){
        $("#example-modal-alert").modal('show');
        $('#deskripsi').summernote({
            placeholder: 'Note : Mohon Tidak Copas Langsung Dari Website/Word/Excel/Power Poin Dll. Jika Mau Copas dari Website/Word/Excel/Power Poin, Copas Dulu Ke Notepad/Sticky Note Baru Copas Ke Sini.',
            tabsize: 2,
            height: 200,
            toolbar: [
                    ['style', ['style']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                
          }); 
        $('#deskripsi').summernote('code', {!! json_encode($nlt->deskripsi) !!});
    });
    
    $(document).ready(function(){
        $('#myForm').on('submit', function(e) {
          
          if($('#deskripsi').summernote('isEmpty')) {
            // console.log('contents is empty, fill it!');
            $('#feedbackabs').show();
            // cancel submit
            e.preventDefault();
          }
          else {
             $('#feedbackabs').hide();
          }
        })
    });
</script>

    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"> Newsletter</a></li>
            <li class="breadcrumb-item">Edit Newsletter</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Edit Newsletter: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Edit Newsletter</i></span>
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
                            
                            <form method="post" action="{{ route('nletter.update', $nlt) }}" class="was-validated" enctype="multipart/form-data" id="myForm">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="form-group">
                                    <label class="form-label" for="judul">Judul</label>
                                    <input type="text" name="judul" value="{{ $nlt->judul }}" id="judul" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="katbahasa">Kategori Bahasa</label>
                                    <select name="katbahasa_id" id="katbahasa_id" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        @foreach($katbhs as $bhs)
                                            <option @if($nlt->katbahasa_id == $bhs->id) value="{{ $bhs->id }}" selected="" @else value="{{ $bhs->id }}" @endif>{{ $bhs->namakbhs }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="publikasi">Status Publikasi</label>
                                    <select name="publikasi" id="publikasi" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        <option @if($nlt->publikasi == 'Ya') value="Ya" selected="" @else value="Ya" @endif>Publish</option>
                                        <option @if($nlt->publikasi == 'Tidak') value="Tidak" selected="" @else value="Tidak" @endif>Unpublish</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="gambar">
                                        Image Newsletter 
                                        <p style="color: red;">
                                            * (Gambar Newsletter Harus 960x640(px))
                                        </p> 
                                    </label>
                                    <input type="file" name="gambar" id="gambar" class="form-control is-valid" accept=".png, .jpg, .jpeg" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control is-valid js-summernote" required=""></textarea>
                                    <div class="invalid-feedback" id="feedbackabs"><i class="fas fa-hand-point-up fa-2x"></i>   Wajib Di isi</div>
                                </div>

                                <center>
                                    <a href="{{ route('nletter') }}" title="">
                                        <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Kembali">
                                            <i class="fas fa-reply mr-1"></i>Back
                                        </button>
                                    </a>

                                    <button type="submit" class="btn btn-outline-success" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Update" id='tunda'>
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
