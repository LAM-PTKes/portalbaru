@extends('admin.template.app')
@section('title')
    Hasil Akreditasi Publish
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
            <li class="breadcrumb-item">Hasil Akreditasi </li>
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
                            Tabel 
                            <span class="fw-300">
                                <i>
                                    Hasil Akreditasi Publish
                                </i>
                            </span>
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
                           
                            <br><br> 
                            

                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="bg-primary-600">
                                    <tr>
                                        <th><center>No</center></th>
                                        @if(auth()->user()->role == 'Ngadimin')
                                            <th><center>Action</center></th>
                                        @endif
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
                                            @if(auth()->user()->role == 'Ngadimin')
                                                <td align="center">
                                                    <form action="{{route('akreditasi.destroy', $hasil)}}" method="post" id="delete_data_{{ $hasil->id }}">
                                                    {{ csrf_field() }}                          
                                                    {{ method_field('DELETE') }}
                                                        <a href="{{ route('akreditasi.edit', $hasil) }}">
                                                            <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit">
                                                                <i class="fa fa-edit fa-2x"></i> 
                                                            </button>
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete" onclick="hapus('{{ $hasil->id }}')">
                                                            <i class="fas fa-trash-alt fa-2x"></i>
                                                        </button>
                                                    </form>

                                                    @if($hasil->is_show == '0')
                                                        <a href="{{ route('statuspub', $hasil) }}">
                                                            <button type="button" class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="right" title="" data-original-title="Publish">
                                                                <i class="fa fa-eye fa-2x"></i> 
                                                            </button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('statusunpub', $hasil) }}">
                                                            <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="tooltip" data-placement="right" title="" data-original-title="Unpublish">
                                                                <i class="fas fa-eye-slash fa-2x"></i> 
                                                            </button>
                                                        </a>
                                                    @endif
                                                </td>
                                            @endif
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