@extends('admin.template.app')
@section('title')
    Tambah File Unduhan
@endsection
@section('content')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#example-modal-alert").modal('show');

            function togglePgi() {
                let selectedText = $('#katunduhan option:selected').text().toLowerCase();
                if (selectedText.includes('instrumen')) {
                    $('#pgi').show();
                    $('#pengguna_instrumen').prop('required', true);
                } else {
                    $('#pgi').hide();
                    $('#pengguna_instrumen').prop('required', false);
                }
            }

            // Initial check on page load
            togglePgi();

            // Check on change
            $('#katunduhan').on('change', togglePgi).trigger('change');
        });
    </script>

    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"> File Unduhan</a></li>
            <li class="breadcrumb-item">Tambah File Unduhan</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y') }}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Tambah File Unduhan: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Tambah File Unduhan</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
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

                            <form method="post" action="{{ route('unduhan.store') }}" class="was-validated"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}


                                <div class="form-group">
                                    <label class="form-label" for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control is-valid"
                                        required="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="jenjang">Jenjang</label>
                                    <select name="jenjang" id="jenjang" class="form-control is-valid" required="">
                                        <option value>--- Pilih ---</option>
                                        <option value="S-3">S-3</option>
                                        <option value="S-2">S-2</option>
                                        <option value="S-1">S-1</option>
                                        <option value="D-4">D-4</option>
                                        <option value="D-3">D-3</option>
                                        <option value="D-2">D-2</option>
                                        <option value="D-1">D-1</option>
                                        <option value="Gizi">Gizi</option>
                                        <option value="Sp-1">Sp-1</option>
                                        <option value="Sp-2">Sp-2</option>
                                        <option value="Profesi">Profesi</option>
                                        <option value="NON-AKADEMIK">NON-AKADEMIK</option>
                                        <option value="-">-</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="bidang_ilmu">Bidang Ilmu</label>
                                    <select name="bidang_ilmu" id="bidang_ilmu" class="form-control is-valid"
                                        required="">
                                        <option value>--- Pilih ---</option>
                                        <option value="Farmasi">Farmasi</option>
                                        <option value="Gizi">Gizi</option>
                                        <option value="Kebidanan">Kebidanan</option>
                                        <option value="Kedokteran">Kedokteran</option>
                                        <option value="Kedokteran Gigi">Kedokteran Gigi</option>
                                        <option value="Kedokteran Hewan">Kedokteran Hewan</option>
                                        <option value="Keperawatan">Keperawatan</option>
                                        <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                        <option value="Kesehatan Lain">Kesehatan Lain</option>
                                        <option value="-">-</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="katunduhan">Kategori Unduhan</label>
                                    <select name="katunduhan" id="katunduhan" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        @foreach ($katundh as $undh)
                                            <option value="{{ $undh->id }}">{{ $undh->namaundh }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group" id="pgi">
                                    <label class="form-label" for="pengguna_instrumen">Program Studi Pengguna
                                        Instrumen</label>
                                    <input type="text" name="pengguna_instrumen" id="pengguna_instrumen"
                                        class="form-control is-valid" required="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="katbahasa">Kategori Bahasa</label>
                                    <select name="katbahasa" id="katbahasa" class="form-control is-valid"
                                        required="">
                                        <option value>Select</option>
                                        @foreach ($katbhs as $bhs)
                                            <option value="{{ $bhs->id }}">{{ $bhs->namakbhs }}</option>
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
                                    <input type="file" name="nama_file" id="nama_file" class="form-control is-valid"
                                        accept=".rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt" required="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control is-valid js-summernote" required=""></textarea>
                                    <div class="invalid-feedback"><i class="fas fa-hand-point-up fa-2x"></i> Wajib Di isi
                                    </div>
                                </div>

                                <center>
                                    <a href="{{ route('unduhan') }}" title="">
                                        <button type="button" class="btn btn-outline-warning"
                                            data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>'
                                            data-placement="bottom" data-toggle="tooltip" title=""
                                            data-original-title="Kembali">
                                            <i class="fas fa-reply mr-1"></i>Back
                                        </button>
                                    </a>

                                    <button type="submit" class="btn btn-outline-success"
                                        data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>'
                                        data-placement="bottom" data-toggle="tooltip" title=""
                                        data-original-title="Simpan">
                                        Save <i class="fas fa-share mr-1"></i>
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
