@extends('admin.template.app')
@section('title')
    Edit Cover Album Photo
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
            <li class="breadcrumb-item"><a href="javascript:void(0);"> Cover Album Photo</a></li>
            <li class="breadcrumb-item">Edit Cover Album Photo</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Edit Cover Album Photo: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Edit Cover Album Photo</i></span>
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
                            <!-- Button trigger modal -->

                            {{-- <a href="{{ route('Kelas.create') }}" title="">
                                <button type="button" class="btn btn-outline-success" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-success-500"></div></div>' data-placement="right" data-toggle="tooltip" title="" data-original-title="Add Data">
                                    <span class="fal fa-plus mr-2"></span> Permintaan Kelas
                                </button>
                            </a> --}}

                            <br><br> 
                            
                            <form method="post" action="{{ route('cover.update', $cvr) }}" class="was-validated" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                
                                 
                                <div class="form-group">
                                    <label class="form-label" for="nama_cover_id">Judul Cover Indonesia</label>
                                    <input type="text" name="nama_cover_id" value="{{ $cvr->nama_cover_id }}" id="nama_cover_id" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="nama_cover_en">Judul Cover English</label>
                                    <input type="text" name="nama_cover_en" value="{{ $cvr->nama_cover_en }}" id="nama_cover_en" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="katbahasa">Kategori Bahasa</label>
                                    <select name="katbahasa" id="katbahasa" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        @foreach($katbhs as $bhs)
                                            <option @if($cvr->katbahasa_id == $bhs->id)
                                                value="{{ $bhs->id }}" selected @else value="{{ $bhs->id }}" @endif>{{ $bhs->namakbhs }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="nfile">
                                        Photo 
                                        <p style="color: red;">
                                            * (File Photo Dalam Bentuk .png, .jpg, dan .jpeg)
                                        </p> 
                                    </label>
                                    <input type="file" name="nfile" id="nfile" class="form-control is-valid" accept=".png, .jpg, .jpeg" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control is-valid js-summernote" required="">{{ $cvr->deskripsi }}</textarea>
                                    <div class="invalid-feedback"><i class="fas fa-hand-point-up fa-2x"></i>   Wajib Di isi</div>
                                </div>

                                <center>
                                    <a href="{{ route('cover') }}" title="">
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