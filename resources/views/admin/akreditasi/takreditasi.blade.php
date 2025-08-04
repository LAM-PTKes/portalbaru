@extends('admin.template.app')
@section('title')
    Hasil Akreditasi
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

        $(document).ready(function(){
            $('#checkbox').on('change', function(){
                $('#password').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
            });
        });

</script>
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">LAMPT-Kes </a></li>
            <li class="breadcrumb-item">Hasil Akreditasi</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Hasil Akreditasi: <span class='fw-300'>Portal WebApp</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>Hasil Akreditasi</i></span>
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
                            @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'Sekretriat')
                                <button type="button" class="btn btn-outline-success waves-effect waves-themed" data-toggle="modal" data-target="#modal1">
                                    <span class="fal fa-plus mr-2"></span> 
                                    Hasil Akreditasi
                                </button>

                                <button type="button" class="btn btn-outline-danger waves-effect waves-themed" data-toggle="modal" data-target="#modal2">
                                    <i class="fas fa-eye mr-2"></i>
                                    Publish Hasil Akreditasi
                                </button>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Form Input Hasil Akreditasi
                                                {{-- <small class="m-0 text-muted">
                                                    Below is a static modal example
                                                </small> --}}
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <form action="{{ route('akreditasi.store') }}" method="POST" accept-charset="utf-8" class="was-validated" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}

                                            <div class="modal-body">

                                            <div class="form-group">
                                                <label class="form-label" for="sidang">Sidang Ke</label>
                                                <input type="text" name="sidang"  id="sidang" class="form-control is-valid" required="" >
                                                {{-- <select name="sidang"  id="sidang" class="form-control is-valid" required="">
                                                    <option value>Select</option>
                                                    @for ($i = 1; $i <= $akre+5; $i++)
                                                        <option value="{{ $i }}"> {{ $i }}</option>
                                                    @endfor
                                                </select> --}}
                                                <div class="invalid-feedback">Wajib Di isi</div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="sidang_ke">Sidang Terakhir</label>
                                                <input type="text" name="sidang_ke" @if(empty($sidang)) value="0" @else value="{{ $sidang }}" @endif  id="sidang_ke" class="form-control is-valid" required="" readonly="">
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
                            <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Form Input Hasil Akreditasi
                                                {{-- <small class="m-0 text-muted">
                                                    Below is a static modal example
                                                </small> --}}
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <form action="{{ route('publishsimak') }}" method="POST" accept-charset="utf-8" class="was-validated" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}

                                            <div class="modal-body">

                                            <div class="form-group">
                                                <label class="form-label" for="sidang_ke">Sidang Terakhir</label>
                                                <input type="text" name="sidang_ke" @if(empty($sidang)) value="0" @else value="{{ $sidang }}" @endif  id="sidang_ke" class="form-control is-valid" required="" readonly="">
                                               {{--  <select name="sidang_ke" id="sidang_ke" class="form-control is-valid" required="">
                                                    @foreach($sidang as $sdg)
                                                        <option value="{{ $sdg->sidang }}">{{ $sdg->sidang }}</option>
                                                    @endforeach
                                                </select> --}}
                                                <div class="invalid-feedback">Wajib Di isi</div>
                                            </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                                                    <span class="fal fa-times mr-1"></span> Close
                                                </button>
                                                <button type="submit" class="btn btn-outline-success">
                                                    <span class="fal fa-eye mr-2"></span> Publish
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
                                        <th><center>No</center></th>
                                        <th><center>Kode PT</center></th>
                                        <th><center>Kode PS</center></th>
                                        <th><center>Nama PT</center></th>
                                        <th><center>Nama PS</center></th>
                                        <th><center>Jenjang</center></th>
                                        <th><center>No SK</center></th>
                                        <th><center>Peringkat Akademis</center></th>
                                        <th><center>Peringkat Profesi</center></th>
                                        <th><center>Peringkat Spesialis</center></th>
                                        <th><center>Tgl Kadaluarsa</center></th>
                                        <th><center>Thn SK</center></th>
                                        <th><center>Status Kadaluarsa</center></th>
                                        <th><center>Rumpun Ilmu</center></th>
                                        <th><center>Sidang Ke</center></th>
                                        <th><center>Id SMS</center></th>
                                        <th><center>Id SK Akreditasi</center></th>
                                        <th><center>Publikasi</center></th>
                                        <th><center>Wilayah</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($akreditasi as $hasil)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td align="center">{{ $hasil->kode_pt }} </td>
                                            <td align="center">{{ $hasil->kode_ps }} </td>
                                            <td align="justify">{{ $hasil->nama_pt }} </td>
                                            <td align="justify">{{ $hasil->nama_ps }} </td>
                                            <td align="justify">{{ $hasil->jenjang }} </td>
                                            <td align="justify">{{ $hasil->no_sk }} </td>
                                            <td align="center">{{ $hasil->peringkat_akademis }} </td>
                                            <td align="center">{{ $hasil->peringkat_profesi }} </td>
                                            <td align="center">{{ $hasil->peringkat_spesialis }} </td>
                                            <td align="center">
                                                {{ date('d-m-Y', strtotime($hasil->tgl_kadaluarsa)) }} 
                                            </td>
                                            <td align="center">{{ $hasil->thn_sk }} </td>
                                            <td align="justify">{{ $hasil->status_kadaluarsa }} </td>
                                            <td align="justify">{{ $hasil->rumpun_ilmu }} </td>
                                            <td align="justify">{{ $hasil->sidang }} </td>
                                            <td align="justify">{{ $hasil->id_sms }} </td>
                                            <td align="justify">{{ $hasil->sk_akreditasi_id }} </td>
                                            <td align="center">
                                                @if($hasil->is_show == '1')
                                                    <span class="d-inline-block badge badge-success opacity-250 text-center p-1 width-50">Publish</span>
                                                @else
                                                    <span class="d-inline-block badge badge-danger opacity-250 text-center p-1 width-50">Unpublish</span>
                                                @endif 
                                            </td>
                                            <td align="justify">{{ $hasil->wil }} </td>
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