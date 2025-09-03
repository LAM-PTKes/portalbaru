<link rel="stylesheet" media="screen, print" href="{{ asset('admin/dist/css/notifications/toastr/toastr.css') }}">
<script src="{{ asset('admin/dist/js/notifications/toastr/toastr.js') }}"></script>

@if (session('asups'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            toastr.success("{!! session('asups') !!}");
        });
    </script>
@endif

@if (session('success'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            toastr.success("{!! session('success') !!}");
        });
    </script>
@endif

@if (session('salah'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            toastr.warning("{!! session('salah') !!}");
        });
    </script>
@endif

@if (session('hapus'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            toastr.error("{!! session('hapus') !!}");
        });
    </script>
@endif

@if ($errors->any())
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            toastr.error("data gagal disimpan ke database");
        });
    </script>
@endif

@if (session('danger'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-exclamation-triangle text-danger"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Ops</span>
                <br>
                {!! session('danger') !!}
            </div>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-shield-check text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Succes</span>
                <br>
                {!! session('success') !!}
            </div>
        </div>
    </div>
@endif

@if (session('warning'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-repeat text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Good Job !!!
                    <i class="fas fa-smile text-warning "></i>
                </span>
                <br>
                {!! session('warning') !!}
            </div>
        </div>
    </div>
@endif

@if (session('belum'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-repeat text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Opsss!!!</span>
                <br>
                {!! session('belum') !!}
            </div>
        </div>
    </div>
@endif

@if (session('tolak'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fas fa-user-times text-warning fa-2x"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Registrasi di Tolak!!!</span>
                <br>
                {!! session('tolak') !!}
            </div>
        </div>
    </div>
@endif

@if (session('edit'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-repeat text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Ops Edit!!!</span>
                <br>
                {!! session('edit') !!}
            </div>
        </div>
    </div>
@endif

@if (session('info'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-exclamation-triangle text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Ops Ada Yang Salah...!!!</span>
                <br>
                {!! session('info') !!}
            </div>
        </div>
    </div>
@endif

@if (session('delete'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-exclamation-triangle text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Ops Delete Berhasil...!!!</span>
                <br>
                {!! session('delete') !!}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-exclamation-triangle text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Ops Ada Yang Salah...!!!</span>
                <br>
                {!! session('error') !!}
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert bg-fusion-400 border-0 fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>

        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fal fa-exclamation-triangle text-warning"></i>
            </div>
            <div class="flex-1">
                <span class="h5">Error!!!</span>
                <br>
                {!! implode('', $errors->all('<li>:message</li>')) !!}
            </div>
        </div>
    </div>
@endif

@if (session('berhasil'))
    <div class="success-box">
        <div class="alert alert-success">
            <center>
                <strong>{!! session('berhasil') !!}</strong>
            </center>
        </div>
    </div>
@endif

@if (session('gagal'))
    <div class="error-box">
        <div class="alert alert-danger">
            <center>
                <strong>{!! session('gagal') !!}</strong>
            </center>
        </div>
    </div>
@endif

@if (session('saranid'))
    <div class="error-box">
        <div class="alert alert-danger">
            <center>
                <strong>{!! session('saranid') !!}</strong>
            </center>
        </div>
    </div>
@endif
