@extends('admin.template.app')
@section('title')
    Beranda
@endsection
@section('content')

<script>
        function hapus(id) {
            var swalWithBootstrapButtons = Swal.mixin(
            {
                customClass:
                {
                    confirmButton: "btn btn-outline-success",
                    cancelButton: "btn btn-outline-danger mr-2"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons
                .fire(
                {
                    title: "Apakah Kamu Yakin Mau delete?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                })
                .then(function(result)
                {
                    if (result.value)
                    {
                        $('#delete_data_'+id).submit();
                        swalWithBootstrapButtons.fire(
                            "Deleted!",
                            "Your data has been deleted.",
                            "success"
                        );
                    }
                    else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    )
                    {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            " :)",
                            "error"
                        );
                    }
                });
        }
</script>
<script>
    $(document).ready(function(){
        $("#example-modal-alert").modal('show');
    });
</script>
   <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active">Introduction</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">{{ date('d F Y')}}</span></span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='fal fa-info-circle'></i> Introduction
                <small>
                    Portal WebApp
                </small>
            </h1>
        </div>
        @include('admin.template.partials._alerts')
        <div class="fs-lg fw-300 p-5 bg-white border-faded rounded mb-g">
            <h3 class="mb-g">
              {{--  @foreach($regis as $k)
                {{ $k}}
               @endforeach  --}}
                Hi {{ auth()->user()->name}},
            </h3>
            <p>
                Selamat Datang Di Dashboard Portal WebApp.
            </p>

        </div>
    </main>


@endsection