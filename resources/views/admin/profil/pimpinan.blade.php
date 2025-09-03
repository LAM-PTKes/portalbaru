@extends('admin.template.app')
@section('title')
    Profile Pimpinan
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

                $('#katprofile_id').select2({
                    dropdownParent: $('#ModalAdd'),
                    width: '100%',
                    placeholder: 'Select'
                });

                $('#jabatan_id').select2({
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

                $('#ekatprofile_id').select2({
                    dropdownParent: $('#ModalEdit'),
                    width: '100%',
                    placeholder: 'Select'
                });

                $('#ejabatan_id').select2({
                    dropdownParent: $('#ModalEdit'),
                    width: '100%',
                    placeholder: 'Select'
                });
            });

            $(document).on('click', '.btn.btn-sm.btn-outline-warning.edit', function() {
                var dt = $(this).val().split('~');
                let id = dt[0];
                let katbahasa_id = dt[1];
                let katprofile_id = dt[2];
                let jabatan_id = dt[3];
                let nama = dt[4];
                let no_urut = dt[5];

                // isi field dasar
                $('#id').val(id);
                $('#ekatbahasa_id').val(katbahasa_id).trigger('change');
                $('#enama').val(nama);
                $('#eno_urut').val(no_urut);
                $('#devhide').hide();

                // reset dulu dependent select
                $('#ekatprofile_id').html('<option value="">Loading...</option>')
                    .prop('disabled', true).val(null).trigger('change');

                $('#ejabatan_id').html('<option value="">Loading...</option>')
                    .prop('disabled', true).val(null).trigger('change');

                // AJAX load katprofile_id
                $.ajax({
                    url: "{{ route('GetProfile') }}",
                    type: "GET",
                    data: {
                        q: katbahasa_id
                    },
                    success: function(res) {
                        if (res && res.data && res.data.length > 0) {
                            let options = '<option value="">Pilih Profil</option>';
                            $.each(res.data, function(i, item) {
                                options +=
                                    `<option value="${item.id}">${item.nama_profile}</option>`;
                            });
                            $('#ekatprofile_id')
                                .html(options)
                                .prop('disabled', false)
                                .val(katprofile_id) // set value default dari tombol
                                .trigger('change');
                        } else {
                            toastr.warning(
                                "Data tidak ditemukan untuk kategori profil pimpinan",
                                "Peringatan");
                        }
                    },
                    error: function() {
                        toastr.error("Ajax internal server error untuk profil pimpinan",
                            "Error");
                    }
                });

                // AJAX load jabatan_id
                $.ajax({
                    url: "{{ route('GetJabatan') }}",
                    type: "GET",
                    data: {
                        q: katbahasa_id
                    },
                    success: function(res) {
                        if (res && res.data && res.data.length > 0) {
                            let options = '<option value="">Pilih Jabatan</option>';
                            $.each(res.data, function(i, item) {
                                options +=
                                    `<option value="${item.id}">${item.jabatan}</option>`;
                            });
                            $('#ejabatan_id')
                                .html(options)
                                .prop('disabled', false)
                                .val(jabatan_id) // set value default dari tombol
                                .trigger('change');
                        } else {
                            toastr.warning("Data tidak ditemukan untuk kategori jabatan",
                                "Peringatan");
                        }
                    },
                    error: function() {
                        toastr.error("Ajax internal server error untuk jabatan", "Error");
                    }
                });

                // tampilkan modal
                $('#ModalEdit').modal('show');
            });


            $('#katbahasa_id').on('select2:select', function(e) {
                let dt = $(this).val();

                // selalu reset dulu
                $('#katprofile_id').html('<option value="">Pilih Profil</option>')
                    .prop('disabled', true)
                    .val(null)
                    .trigger('change');

                $('#jabatan_id').html('<option value="">Pilih Profil</option>')
                    .prop('disabled', true)
                    .val(null)
                    .trigger('change');

                if (dt) {
                    $.ajax({
                        url: "{{ route('GetProfile') }}",
                        type: "GET",
                        data: {
                            q: dt
                        },
                        success: function(res) {
                            if (res && res.data && res.data.length > 0) {
                                let options = '<option value="">Pilih Profil</option>';
                                $.each(res.data, function(i, item) {
                                    options +=
                                        `<option value="${item.id}">${item.nama_profile}</option>`;
                                });
                                $('#katprofile_id')
                                    .html(options)
                                    .prop('disabled', false)
                                    .trigger('change');
                            } else {
                                toastr.warning(
                                    "Data tidak ditemukan untuk kategori profil pimpinan",
                                    "Peringatan"
                                );
                            }
                        },
                        error: function() {
                            toastr.error("Ajax internal server error untuk profil pimpinan",
                                "Error");
                        }
                    });


                    $.ajax({
                        url: "{{ route('GetJabatan') }}",
                        type: "GET",
                        data: {
                            q: dt
                        },
                        success: function(res) {
                            console.log(res);

                            if (res && res.data && res.data.length > 0) {
                                let options = '<option value="">Pilih Profil</option>';
                                $.each(res.data, function(i, item) {
                                    options +=
                                        `<option value="${item.id}">${item.jabatan}</option>`;
                                });
                                $('#jabatan_id')
                                    .html(options)
                                    .prop('disabled', false)
                                    .trigger('change');
                            } else {
                                toastr.warning(
                                    "Data tidak ditemukan untuk kategori jabatan",
                                    "Peringatan"
                                );
                            }
                        },
                        error: function() {
                            toastr.error("Ajax internal server error untuk jabatan", "Error");
                        }
                    });
                }
            });

            $('#ekatbahasa_id').on('select2:select', function(e) {
                let dt = $(this).val();

                // selalu reset dulu
                $('#ekatprofile_id').html('<option value="">Pilih Profil</option>')
                    .prop('disabled', true)
                    .val(null)
                    .trigger('change');

                $('#ejabatan_id').html('<option value="">Pilih Profil</option>')
                    .prop('disabled', true)
                    .val(null)
                    .trigger('change');

                if (dt) {
                    $.ajax({
                        url: "{{ route('GetProfile') }}",
                        type: "GET",
                        data: {
                            q: dt
                        },
                        success: function(res) {
                            console.log(res);
                            if (res && res.data && res.data.length > 0) {
                                let options = '<option value="">Pilih Profil</option>';
                                $.each(res.data, function(i, item) {
                                    options +=
                                        `<option value="${item.id}">${item.nama_profile}</option>`;
                                });
                                $('#ekatprofile_id')
                                    .html(options)
                                    .prop('disabled', false)
                                    .trigger('change');
                            } else {
                                toastr.warning(
                                    "Data tidak ditemukan untuk kategori profil pimpinan",
                                    "Peringatan"
                                );
                            }
                        },
                        error: function() {
                            toastr.error("Ajax internal server error untuk profil pimpinan",
                                "Error");
                        }
                    });


                    $.ajax({
                        url: "{{ route('GetJabatan') }}",
                        type: "GET",
                        data: {
                            q: dt
                        },
                        success: function(res) {
                            console.log(res);

                            if (res && res.data && res.data.length > 0) {
                                let options = '<option value="">Pilih Profil</option>';
                                $.each(res.data, function(i, item) {
                                    options +=
                                        `<option value="${item.id}">${item.jabatan}</option>`;
                                });
                                $('#ejabatan_id')
                                    .html(options)
                                    .prop('disabled', false)
                                    .trigger('change');
                            } else {
                                toastr.warning(
                                    "Data tidak ditemukan untuk kategori jabatan",
                                    "Peringatan"
                                );
                            }
                        },
                        error: function() {
                            toastr.error("Ajax internal server error untuk jabatan", "Error");
                        }
                    });
                }
            });


            $('#katprofile_id').prop('disabled', true).val(null).trigger('change');
            $('#jabatan_id').prop('disabled', true).val(null).trigger('change');
            $('#ekatprofile_id').prop('disabled', true).val(null).trigger('change');
            $('#ejabatan_id').prop('disabled', true).val(null).trigger('change');

        });
    </script>

    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">LAMPT-Kes </a></li>
            <li class="breadcrumb-item">Profile Pimpinan</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y') }}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Profile Pimpinan: <span class='fw-300'>Portal WebApp</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>Profile Pimpinan</i></span>
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
                                    Profile Pimpinan
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
                                            Photo
                                        </th>
                                        <th class="text-center">
                                            Nama
                                        </th>
                                        <th class="text-center">
                                            Kategori Profile
                                        </th>
                                        <th class="text-center">
                                            Jabatan
                                        </th>
                                        <th class="text-center">
                                            No Urut
                                        </th>
                                        <th class="text-center">
                                            Kategori Bahasa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profil as $v)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td align="center">
                                                <form action="{{ route('DelProfilePimpinan', $v) }}" method="post"
                                                    id="delete_data_{{ $v->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="button" class="btn btn-sm btn-outline-warning edit"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Edit"
                                                        value="{{ $v->id }}~{{ $v->katbahasa_id }}~{{ $v->katprofile_id }}~{{ $v->jabatan_id }}~{{ $v->nama }}~{{ $v->no_urut }}">
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
                                            <td align="center">
                                                @if (empty($v->img))
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Tidak Ada Image">
                                                        <i class="fas fa-images fa-2x"></i>
                                                    </button>
                                                @else
                                                    <a href="{{ route('secure.document.folder', ['folder' => 'img', 'filename' => $v->img]) }}"
                                                        target="blank" title="">
                                                        <button type="button" class="btn btn-sm btn-outline-success"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Lihat Image">
                                                            <i class="fas fa-images fa-2x"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $v->nama }} </td>
                                            <td align="center">{{ $v->katprofile->nama_profile }} </td>
                                            <td align="center">{{ $v->jabatan->jabatan }} </td>
                                            <td align="center">{{ $v->no_urut }} </td>
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
                <form action="{{ route('StoProfilePimpinan') }}" method="POST" accept-charset="utf-8"
                    class="was-validated" enctype="multipart/form-data">
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
                            <label class="form-label" for="katprofile_id">
                                Kategori Profil Pimpinan
                            </label>
                            <select class="select2 form-control w-100 is-valid" name="katprofile_id" id="katprofile_id"
                                required>
                                <option value="">Select</option>
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="jabatan_id">
                                Kategori Jabatan
                            </label>
                            <select class="select2 form-control w-100 is-valid" name="jabatan_id" id="jabatan_id"
                                required>
                                <option value="">Select</option>
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control is-valid"
                                required="">
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="no_urut">No Urut</label>
                            <input type="number" name="no_urut" id="no_urut" class="form-control is-valid"
                                required="" placeholder="number only">
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="img">
                                File Unduhan
                                <sup style="color: red;">
                                    * (Bentuk File Extensi png, jpg, jpeg)
                                </sup>
                            </label>
                            <input type="file" name="img" id="img" class="form-control is-valid"
                                accept="image/*" required="">
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
                <form action="{{ route('UpProfilePimpinan') }}" method="POST" accept-charset="utf-8"
                    class="was-validated" enctype="multipart/form-data" id="FmrEdit">
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
                            <label class="form-label" for="ekatprofile_id">
                                Kategori Profil Pimpinan
                            </label>
                            <select class="select2 form-control w-100 is-valid" name="ekatprofile_id" id="ekatprofile_id"
                                required>
                                <option value="">Select</option>
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="ejabatan_id">
                                Kategori Jabatan
                            </label>
                            <select class="select2 form-control w-100 is-valid" name="ejabatan_id" id="ejabatan_id"
                                required>
                                <option value="">Select</option>
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="enama">Nama</label>
                            <input type="text" name="enama" id="enama" class="form-control is-valid"
                                required="">
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="eno_urut">No Urut</label>
                            <input type="number" name="eno_urut" id="eno_urut" class="form-control is-valid"
                                required="" placeholder="number only">
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="eimg">
                                File Unduhan
                                <sup style="color: red;">
                                    * (Bentuk File Extensi png, jpg, jpeg)
                                </sup>
                            </label>
                            <input type="file" name="eimg" id="eimg" class="form-control is-valid"
                                accept="image/*">
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
