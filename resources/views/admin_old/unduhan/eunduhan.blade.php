@extends('admin.template.app')
@section('title')
    Edit Capaian Tahunan
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
            <li class="breadcrumb-item"><a href="javascript:void(0);"> capaian</a></li>
            <li class="breadcrumb-item">Edit Capaian Tahunan</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Edit Capaian Tahunan: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Edit Capaian Tahunan</i></span>
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
                            
                            <form method="post" action="{{ route('unduhan.update', $und) }}" class="was-validated" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                
                                <div class="form-group">
                                    <label class="form-label" for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" value="{{ $und->judul }}" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="jenjang">Jenjang</label>
                                    <select name="jenjang" id="jenjang" class="form-control is-valid" required="">
                                        <option value>--- Pilih ---</option>
                                        <option @if($und->jenjang == 'S-3') value="S-3" selected="" @else value="S-3" @endif>S-3</option>
                                        <option @if($und->jenjang == 'S-2') value="S-2" selected="" @else value="S-2" @endif>S-2</option>
                                        <option @if($und->jenjang == 'S-1') value="S-1" selected="" @else value="S-1" @endif>S-1</option>
                                        <option @if($und->jenjang == 'D-4') value="D-4" selected="" @else value="D-4" @endif>D-4</option>
                                        <option @if($und->jenjang == 'D-3') value="D-3" selected="" @else value="D-3" @endif>D-3</option>
                                        <option @if($und->jenjang == 'D-2') value="D-2" selected="" @else value="D-2" @endif>D-2</option>
                                        <option @if($und->jenjang == 'D-1') value="D-1" selected="" @else value="D-1" @endif>D-1</option>
                                        <option @if($und->jenjang == 'Gizi') value="Gizi" selected="" @else value="Gizi" @endif>Gizi</option>
                                        <option @if($und->jenjang == 'Sp-2') value="Sp-2" selected="" @else value="Sp-2" @endif>Sp-2</option>
                                        <option @if($und->jenjang == 'Sp-1') value="Sp-1" selected="" @else value="Sp-1" @endif>Sp-1</option>
                                        <option @if($und->jenjang == 'Profesi') value="Profesi" selected="" @else value="Profesi" @endif>Profesi</option>
                                        <option @if($und->jenjang == 'NON-AKADEMIK') value="NON-AKADEMIK" selected="" @else value="NON-AKADEMIK" @endif>NON-AKADEMIK</option>
                                        <option @if($und->jenjang == '-') value="-" selected="" @else value="-" @endif>-</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="bidang_ilmu">Bidang Ilmu</label>
                                    <select name="bidang_ilmu" id="bidang_ilmu" class="form-control is-valid" required="">
                                        <option value>--- Pilih ---</option>

                                        <option @if($und->bidang_ilmu == 'Farmasi') value="Farmasi" selected="" @else value="Farmasi" @endif>Farmasi</option>
                                        
                                        <option @if($und->bidang_ilmu == 'Gizi') value="Gizi" selected="" @else value="Gizi" @endif>Gizi</option>
					
					<option @if($und->bidang_ilmu == 'Kebidanan') value="Kebidanan" selected="" @else value="Kebidanan" @endif>Kebidanan</option>

                                        <option @if($und->bidang_ilmu == 'Kedokteran') value="Kedokteran" selected="" @else value="Kedokteran" @endif>Kedokteran</option>
					
                                        <option @if($und->bidang_ilmu == 'Kedokteran Gigi') value="Kedokteran Gigi" selected="" @else value="Kedokteran Gigi" @endif>Kedokteran Gigi</option>

                                        <option @if($und->bidang_ilmu == 'Kedokteran Hewan') value="Kedokteran Hewan" selected="" @else value="Kedokteran Hewan" @endif>Kedokteran Hewan</option>

                                        <option @if($und->bidang_ilmu == 'Keperawatan') value="Keperawatan" selected="" @else value="Keperawatan" @endif>Keperawatan</option>

                                        <option @if($und->bidang_ilmu == 'Kesehatan Masyarakat') value="Kesehatan Masyarakat" selected="" @else value="Kesehatan Masyarakat" @endif>Kesehatan Masyarakat</option>
                                        
                                        <option @if($und->bidang_ilmu == 'Kesehatan Lain') value="Kesehatan Lain" selected="" @else value="Kesehatan Lain" @endif>Kesehatan Lain</option>
                                        
                                        <option @if($und->bidang_ilmu == '-') value="-" selected="" @else value="-" @endif>-</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="katunduhan">Kategori Unduhan</label>
                                    <select name="katunduhan" id="katunduhan" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        @foreach($katundh as $undh)
                                            <option @if($und->katunduhan_id == $undh->id) value="{{ $undh->id }}" selected="" @else value="{{ $undh->id }}" @endif>{{ $undh->namaundh }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="katbahasa">Kategori Bahasa</label>
                                    <select name="katbahasa" id="katbahasa" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        @foreach($katbhs as $bhs)
                                            <option @if($und->katbahasa_id == $bhs->id)
                                                value="{{ $bhs->id }}" selected @else value="{{ $bhs->id }}" @endif>{{ $bhs->namakbhs }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="nama_file">
                                        File Unduhan 
                                        <p style="color: red;">
                                            * (Bentuk File Extensi .rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt)
                                        </p> 
                                    </label>
                                    <input type="file" name="nama_file" id="nama_file" class="form-control is-valid" accept=".rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control is-valid js-summernote" required="">{{ $und->deskripsi }}</textarea>
                                    <div class="invalid-feedback"><i class="fas fa-hand-point-up fa-2x"></i>   Wajib Di isi</div>
                                </div>

                                <center>
                                    <a href="{{ route('unduhan') }}" title="">
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