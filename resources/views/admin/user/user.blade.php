@extends('admin.template.app')
@section('title')
    Data user
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
            <li class="breadcrumb-item">Data User</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y') }}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Data User: <span class='fw-300'>Portal WebApp</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>Data User</i></span>
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
                                    data-toggle="modal" data-target="#default-example-modal">
                                    <span class="fal fa-plus mr-2"></span>
                                    Data User
                                </button>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Form Input Data User
                                                {{-- <small class="m-0 text-muted">
                                                    Below is a static modal example
                                                </small> --}}
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <form action="{{ route('user.store') }}" method="POST" accept-charset="utf-8"
                                            class="was-validated" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                        class="form-control is-valid" required="">
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control is-valid" required="">
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control is-valid" placeholder="Min 6 Karakter"
                                                        required="">
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                    <br>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox">
                                                        <label class="custom-control-label" for="checkbox">Show
                                                            Password</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="role">Role</label>
                                                    <select name="role" id="role" class="form-control is-valid"
                                                        required="">
                                                        <option value>Select</option>
                                                        <option value="Akreditasi">Akreditasi</option>
                                                        <option value="IT">IT</option>
                                                        <option value="Kadiv">Kadiv</option>
                                                        <option value="Kepegawaian">Kepegawaian</option>
                                                        <option value="Keuangan">Keuangan</option>
                                                        <option value="Sarana">Sarana</option>
                                                        <option value="Sekretariat">Sekretariat</option>
                                                        <option value="SPMI">SPMI</option>
                                                        <option value="RnD">Research and Development</option>
                                                    </select>
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-dismiss="modal">
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

                            <br><br>


                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="bg-primary-600">
                                    <tr>
                                        <th>
                                            <center>No</center>
                                        </th>
                                        <th>
                                            <center>Nama</center>
                                        </th>
                                        <th>
                                            <center>Email</center>
                                        </th>
                                        <th>
                                            <center>Role</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td align="justify">{{ $user->name }} </td>
                                            <td align="center">{{ $user->email }} </td>
                                            <td align="center">
                                                @if ($user->role == 'Ngadimin')
                                                    Administrator
                                                @else
                                                    {{ $user->role }}
                                                @endif
                                            </td>
                                            <td align="center">
                                                <form action="{{ route('user.destroy', $user) }}" method="post"
                                                    id="delete_data_{{ $user->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a href="{{ route('user.edit', $user) }}">
                                                        <button type="button" class="btn btn-sm btn-outline-warning"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    @if (auth()->user()->role == 'Ngadimin')
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Delete"
                                                            onclick="hapus('{{ $user->id }}')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @endif
                                                </form>
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
