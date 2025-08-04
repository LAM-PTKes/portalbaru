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

@if(session('asup'))
   <!-- modal alert -->
    <div class="modal modal-alert fade" id="example-modal-alert" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terima Kasih</h5>
                </div>
                <div class="modal-body">
                    {!! session('asup') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="top" data-toggle="tooltip" title="" data-original-title="Submit" data-dismiss="modal">
                        <i class="fal fa-thumbs-up mr-2 fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('gatot'))
   <!-- modal alert -->
    <div class="modal modal-alert fade" id="example-modal-alert" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Maaf Anda Tidak Bisa Akses</h5>
                </div>
                <div class="modal-body">
                    {!! session('gatot') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="top" data-toggle="tooltip" title="" data-original-title="Submit" data-dismiss="modal">
                        <i class="fal fa-thumbs-up mr-2 fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('salah'))
   <!-- modal alert -->
    <div class="modal modal-alert fade" id="example-modal-alert" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Maaf !!!</h5>
                </div>
                <div class="modal-body">
                    {!! session('salah') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="top" data-toggle="tooltip" title="" data-original-title="Submit" data-dismiss="modal">
                        <i class="fal fa-thumbs-up mr-2 fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('kosong'))
   <!-- modal alert -->
    <div class="modal modal-alert fade" id="example-modal-alert" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Maaf !!!</h5>
                </div>
                <div class="modal-body">
                    {!! session('kosong') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="top" data-toggle="tooltip" title="" data-original-title="Submit" data-dismiss="modal">
                        <i class="fal fa-thumbs-up mr-2 fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('hapus'))
   <!-- modal alert -->
    <div class="modal modal-alert fade" id="example-modal-alert" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete !!!</h5>
                </div>
                <div class="modal-body">
                    {!! session('hapus') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-dark-500"></div></div>' data-placement="top" data-toggle="tooltip" title="" data-original-title="Submit" data-dismiss="modal">
                        <i class="fal fa-thumbs-up mr-2 fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
