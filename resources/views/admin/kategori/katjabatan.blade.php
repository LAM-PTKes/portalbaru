@extends('admin.template.app')
@section('title')
    Kategori Jabatan
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
            $('#ModalAdd').on('shown.bs.modal', function() {
                $('#katbahasa_id').select2({
                    dropdownParent: $('#ModalAdd'),
                    width: '100%',
                    placeholder: 'Select'
                });
            });

            $('#ModalEdit').on('shown.bs.modal', function() {
                $('#ekatbahasa_id').select2({
                    dropdownParent: $('#ModalEdit'),
                    width: '100%',
                    placeholder: 'Select'
                });
            });

            $(document).on('click', '.btn.btn-sm.btn-outline-warning.edit', function() {
                var dt = $(this).val().split('~');
                // console.log(dt[2]);

                // isi form modal
                $('#id').val(dt[0]);
                $('#ekatbahasa_id').val(dt[1]).trigger('change');
                $('#ejabatan').val(dt[2]);
                $('#devhide').hide();

                // tampilkan modal
                $('#ModalEdit').modal('show');
            });


        });
    </script>
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">LAMPT-Kes </a></li>
            <li class="breadcrumb-item">Kategori Jabatan</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y') }}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Kategori Jabatan: <span class='fw-300'>Portal WebApp</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>Kategori Jabatan</i></span>
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
                            @if (auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'Sekretariat')
                                <button type="button" class="btn btn-outline-success waves-effect waves-themed"
                                    data-toggle="modal" data-target="#ModalAdd">
                                    <span class="fal fa-plus mr-2"></span>
                                    Kategori Jabatan
                                </button>
                            @endif

                            <br><br>


                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="bg-primary-600">
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                        <th class="text-center">
                                            Nama Jabatan
                                        </th>
                                        <th class="text-center">
                                            Kategori Bahasa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jbt as $v)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td align="center">
                                                <form action="{{ route('DelKatJabatan', $v) }}" method="post"
                                                    id="delete_data_{{ $v->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-sm btn-outline-warning edit"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Edit"
                                                        value="{{ $v->id }}~{{ $v->katbahasa_id }}~{{ $v->jabatan }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    @if (auth()->user()->role == 'Ngadimin')
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Delete"
                                                            onclick="hapus('{{ $v->id }}')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>{{ $v->jabatan }} </td>
                                            <td align="center">{{ $v->katbahasa->namakbhs }} </td>
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


    <!-- Modal -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Form Input Data
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form action="{{ route('StoKatJabatan') }}" method="POST" accept-charset="utf-8" class="was-validated"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label" for="katbahasa_id">
                                Katgori Bahasa
                            </label>
                            <select class="select2 form-control w-100 is-valid" name="katbahasa_id" id="katbahasa_id"
                                required>
                                <option value="">Select</option>
                                @foreach ($bhs as $k)
                                    <option value="{{ $k->id }}">{{ $k->namakbhs }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="jabatan">Nama Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control is-valid"
                                required="">
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                            <span class="fal fa-times mr-1"></span> Close
                        </button>
                        <button type="submit" class="btn btn-outline-success">
                            <span class="fal fa-save mr-2"></span> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Form Edit Data
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form action="{{ route('UpKatJabatan') }}" method="POST" accept-charset="utf-8" class="was-validated"
                    enctype="multipart/form-data" id="FmrEdit">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="modal-body">

                        <div class="form-group" id="devhide">
                            <label class="form-label" for="id">Id</label>
                            <input type="text" name="id" id="id" class="form-control is-valid"
                                required="">
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="ekatbahasa_id">
                                Katgori Bahasa
                            </label>
                            <select class="select2 form-control w-100 is-valid" name="ekatbahasa_id" id="ekatbahasa_id"
                                required>
                                <option value="">Select</option>
                                @foreach ($bhs as $k)
                                    <option value="{{ $k->id }}">{{ $k->namakbhs }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="ejabatan">Nama Jabatan</label>
                            <input type="text" name="ejabatan" id="ejabatan" class="form-control is-valid"
                                required="">
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                            <span class="fal fa-times mr-1"></span> Close
                        </button>
                        <button type="submit" class="btn btn-outline-success">
                            <span class="fal fa-save mr-2"></span> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
