@extends('admin.template.app')
@section('title')
    Edit User
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
            <li class="breadcrumb-item">Edit User</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Edit User: <span class='fw-300'></span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Form <span class="fw-300"><i>Edit User</i></span>
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
                            
                            <form method="post" action="{{ route('user.update', $user) }}" class="was-validated">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="form-group">
                                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{ $user->name }}"  id="nama_lengkap" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}"  id="email" class="form-control is-valid" required="" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password"  id="password" class="form-control is-valid" placeholder="Min 6 Karakter" >
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                    <br>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="checkbox">
                                        <label class="custom-control-label" for="checkbox">Show Password</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="role">Role</label>
                                    <select name="role"  id="role" class="form-control is-valid" required="">
                                        <option value>Select</option>
                                        <option @if($user->role == 'Akreditasi') value="Akreditasi" selected="" @else value="Akreditasi" @endif>Akreditasi</option>
                                        <option @if($user->role == 'IT') value="IT" selected="" @else value="IT" @endif>IT</option>
                                        <option @if($user->role == 'Kadiv') value="Kadiv" selected="" @else value="Kadiv" @endif>Kadiv</option>
                                        <option @if($user->role == 'Kadiv') value="Kadiv" selected="" @else value="Kepegawaian" @endif>Kepegawaian</option>
                                        <option @if($user->role == 'Keuangan') value="Keuangan" selected="" @else value="Keuangan" @endif>Keuangan</option>
                                        <option @if($user->role == 'Sarana') value="Sarana" selected="" @else value="Sarana" @endif>Sarana</option>
                                        <option @if($user->role == 'SPMI') value="SPMI" selected="" @else value="SPMI" @endif>SPMI</option>
                                        <option @if($user->role == 'Sekretariat') value="Sekretariat" selected="" @else value="Sekretariat" @endif>Sekretariat</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Di isi</div>
                                </div>

                                <center>
                                    <a href="{{ route('user') }}" title="">
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