@extends('admin.template.app')
@section('title')
    Riset
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
                            " <i class='fas fa-meh fa-4x'></i>",
                            "error"
                        );
                    }
                });
        }

        $(document).ready(function(){
            $("#example-modal-alert").modal('show');

        });
</script>
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">LAM-PTKes </a></li>
            <li class="breadcrumb-item">Riset</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Riset: <span class='fw-300'>Portal WebApp</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>Riset</i></span>
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
                            @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'RnD' || auth()->user()->role == 'SPMI' || auth()->user()->role == 'Sekretariat')
                                <a href="{{ route('riset.create') }}" title="">
                                    <button type="button" class="btn btn-outline-success waves-effect waves-themed" >
                                        <span class="fal fa-plus mr-2"></span>
                                        Riset
                                    </button>
                                </a>
                            @endif

                            <br><br>


                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="bg-primary-600">
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Action</center></th>
                                        <th><center>File Riset</center></th>
                                        <th><center>Image Riset</center></th>
                                        <th><center>Kategori Bahasa</center></th>
                                        <th><center>Judul</center></th>
                                        <th><center>Pengarang</center></th>
                                        <th><center>Ringkasan Hasil Riset</center></th>
                                        <th><center>Status Publikasi</center></th>
                                        <th><center>Views</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($riset as $rst)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td align="center">
                                                <form action="{{route('riset.destroy', $rst)}}" method="post" id="delete_data_{{ $rst->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                    <a href="{{ route('riset.edit', $rst) }}">
                                                        <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="fa fa-edit fa-2x"></i>
                                                        </button>
                                                    </a>
                                                    @if(auth()->user()->role == 'Ngadimin')
                                                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete" onclick="hapus('{{ $rst->id }}')">
                                                            <i class="fas fa-trash-alt fa-2x"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td align="center">
                                                <a href="{{ route('secure.document.folder', ['folder' => 'riset', 'filename' => $rst->file_riset]) }}" title="" target="blank">
                                                    <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat">
                                                        <i class="fas fa-eye fa-2x"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <a href="{{ route('secure.document.folder', ['folder' => 'riset', 'filename' => $rst->gambar_riset]) }}" title="" target="blank">
                                                    <button type="button" class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat">
                                                        <i class="fas fa-images fa-2x"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td align="center">{{ $rst->katbahasa->namakbhs }} </td>
                                            <td align="justify">{{ $rst->judul_riset }} </td>
                                            <td align="justify">{{ $rst->pengarang_riset }} </td>
                                            <td align="justify">{!! $rst->ringkasan_hasil_riset !!} </td>
                                            <td align="center">{{ $rst->publikasi }} </td>
                                            <td align="center">{{ $rst->views }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- datatable end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
