@extends('admin.template.app')
@section('title')
    Tambah Kontak Kami
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
            <li class="breadcrumb-item"><a href="javascript:void(0);"> Kontak Kami</a></li>
            <li class="breadcrumb-item">Tambah Kontak Kami</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Tambah Kontak Kami: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Tambah Kontak Kami</i></span>
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
                            
                            <form method="post" action="{{ route('kontak.store') }}" class="was-validated" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}

                                
                                <div class="form-group">
                                    <label class="form-label" for="ntentang">Judul</label>
                                    <input type="text" name="ntentang" id="ntentang" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="tlp">No Telp 1</label>
                                    <input type="text" name="tlp" id="tlp" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="ponsel">No Telp 2</label>
                                    <input type="text" name="ponsel" id="ponsel" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="kantor">No Telp 3</label>
                                    <input type="text" name="kantor" id="kantor" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="jam_kerja">Jam Operasional Kantor</label>
                                    <textarea name="jam_kerja" id="jam_kerja" class="form-control is-valid" rows="5" required=""></textarea>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="alamat">Alamat Kantor</label>
                                    <textarea name="alamat" id="alamat" class="form-control is-valid" rows="5" required=""></textarea>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="link">Link Google Map</label>
                                    <textarea name="link" id="link" class="form-control is-valid" rows="5" required=""></textarea>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="katbahasa">Kategori Bahasa</label>
                                    <select name="katbahasa" id="katbahasa" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        @foreach($katbhs as $bhs)
                                            <option value="{{ $bhs->id }}">{{ $bhs->namakbhs }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <center>
                                    <a href="{{ route('kontak') }}" title="">
                                        <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Kembali">
                                            <i class="fas fa-reply mr-1"></i>Back
                                        </button>
                                    </a>

                                    <button type="submit" class="btn btn-outline-success" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Simpan">
                                        Save  <i class="fas fa-share mr-1"></i>
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