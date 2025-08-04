@extends('admin.template.app')
@section('title')
    Profile User
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
            <li class="breadcrumb-item"><a href="javascript:void(0);"> User</a></li>
            <li class="breadcrumb-item">Profile User</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Profile User: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            <span class="fw-300"><i>Profile User</i></span>
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
                            
                            <form method="post" action="{{ route('pengguna.update', $users->id) }}" class="was-validated">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="form-group">
                                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{ $users->name }}"  id="nama_lengkap" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" value="{{ $users->email }}"  id="email" class="form-control is-valid" required="" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password"  id="password" class="form-control is-valid" placeholder="Min 6 Karakter" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                    <br>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="checkbox">
                                        <label class="custom-control-label" for="checkbox">Show Password</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="role">Hak Akses</label>
                                    <input type="text" name="role"  id="role" class="form-control is-valid" required="" value="{{ $users->role}}" readonly="">
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <center>
                                    <button type="submit" class="btn btn-outline-success" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit">
                                        Submit  <i class="fas fa-share mr-1"></i>
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