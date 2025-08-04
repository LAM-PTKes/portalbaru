@extends('admin.template.app')
@section('title')
    File Unduhan
@endsection
@section('content')
    <script>
        function hapus(id) {
            var swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-outline-success",
                    cancelButton: "btn btn-outline-danger mr-2"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons
                .fire({
                    title: "Apakah Kamu Yakin Mau delete?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                })
                .then(function(result) {
                    if (result.value) {
                        $('#delete_data_' + id).submit();
                        swalWithBootstrapButtons.fire(
                            "Deleted!",
                            "Your data has been deleted.",
                            "success"
                        );
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            " <i class='fas fa-meh fa-4x'></i>",
                            "error"
                        );
                    }
                });
        }

        $(document).ready(function() {
            $("#example-modal-alert").modal('show');

        });

        $(document).ready(function() {
            $('#checkbox').on('change', function() {
                $('#password').attr('type', $('#checkbox').prop('checked') == true ? "text" : "password");
            });
        });
    </script>
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">LAMPT-Kes </a></li>
            <li class="breadcrumb-item">File Unduhan</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y') }}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> File Unduhan: <span class='fw-300'>Portal WebApp</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>File Unduhan</i></span>
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
                            @if (auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'Sekretariat' || auth()->user()->role == 'Akreditasi')
                                <a href="{{ route('unduhan.create') }}" title="">
                                    <button type="button" class="btn btn-outline-success waves-effect waves-themed">
                                        <span class="fal fa-plus mr-2"></span>
                                        File Unduhan
                                    </button>
                                </a>
                            @endif

                            <br><br>


                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="bg-primary-600">
                                    <tr>
                                        <th>
                                            <center>No</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                        <th>
                                            <center>Judul</center>
                                        </th>
                                        <th>
                                            <center>Jenjang</center>
                                        </th>
                                        <th>
                                            <center>Bidang Ilmu</center>
                                        </th>
                                        <th>
                                            <center>Deskripsi</center>
                                        </th>
                                        <th>
                                            <center>Kategori Unduhan</center>
                                        </th>
                                        <th>
                                            <center>Program Studi Pengguna Instrumen</center>
                                        </th>
                                        <th>
                                            <center>Kategori Bahasa</center>
                                        </th>
                                        <th>
                                            <center>File Unduhan</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unduhan as $und)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td align="center">
                                                <form action="{{ route('unduhan.destroy', $und) }}" method="post"
                                                    id="delete_data_{{ $und->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a href="{{ route('unduhan.edit', $und) }}">
                                                        <button type="button" class="btn btn-sm btn-outline-warning"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Edit">
                                                            <i class="fa fa-edit fa-2x"></i>
                                                        </button>
                                                    </a>
                                                    @if (auth()->user()->role == 'Ngadimin')
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Delete"
                                                            onclick="hapus('{{ $und->id }}')">
                                                            <i class="fas fa-trash-alt fa-2x"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td align="justify">{{ $und->judul }} </td>
                                            <td align="center">{{ $und->jenjang }} </td>
                                            <td align="center">{{ $und->bidang_ilmu }} </td>
                                            <td align="justify">{!! $und->deskripsi !!} </td>
                                            <td align="center">{{ $und->katunduhan->namaundh }} </td>
                                            <td align="center">{{ $und->pengguna_instrumen }} </td>
                                            <td align="center">{{ $und->katbahasa->namakbhs }} </td>
                                            <td>
                                                <a href="{{ route('secure.document.folder', ['folder' => 'unduhan', 'filename' => $und->nama_file]) }}" title=""
                                                    target="blank">
                                                    {{ $und->nama_file }}
                                                </a>
                                            </td>
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
