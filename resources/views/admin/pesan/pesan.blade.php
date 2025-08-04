@extends('admin.template.app')
@section('title')
    Saran
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
            <li class="breadcrumb-item">Saran</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Saran: <span class='fw-300'>Portal WebApp</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>Saran</i></span>
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
                                        <th><center>Action</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Nama</center></th>
                                        <th><center>Institusi</center></th>
                                        <th><center>Saran</center></th>
                                        <th><center>Keluhan</center></th>
                                        <th><center>Email</center></th>
                                        <th><center>Alamat</center></th>
                                        <th><center>Telp</center></th>
                                        <th><center>Balasan</center></th>
                                        <th><center>Created_at</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pesan as $saran)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td align="center">
                                                <form action="{{route('saran.destroy', $saran)}}" method="post" id="delete_data_{{ $saran->id }}">
                                                {{ csrf_field() }}                          
                                                {{ method_field('DELETE') }}
                                                    <a href="{{ route('saran.edit', $saran) }}">
                                                        <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Balas">
                                                            <i class="fas fa-reply fa-2x"></i>
                                                        </button>
                                                    </a>
                                                    @if(auth()->user()->role == 'Ngadimin')
                                                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete" onclick="hapus('{{ $saran->id }}')">
                                                            <i class="fas fa-trash-alt fa-2x"></i> 
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td align="center">
                                                @if($saran->status == 'Baru')
                                                    <span class="d-inline-block badge badge-danger opacity-250 text-center p-1 width-6">Baru</span>
                                                @else
                                                    <span class="d-inline-block badge badge-success opacity-250 text-center p-1 width-6">Baca</span>
                                                @endif
                                            </td>
                                            <td align="justify">{{ $saran->nama }} </td>
                                            <td align="center">{{ $saran->institusi }} </td>
                                            <td align="justify">{{ str_limit($saran->saran, $limit = 100, $end = '...') }} </td>
                                            <td align="justify">{{ str_limit($saran->keluhan, $limit = 100, $end = '...') }} </td>
                                            <td align="center">{{ $saran->email }} </td>
                                            <td align="justify">{{ $saran->alamat }} </td>
                                            <td align="center">{{ $saran->Telp }} </td>
                                            <td align="justify">{!! $saran->balasan !!} </td>
                                            <td align="center">{{ date('d F Y H:i:s', strtotime($saran->created_at)) }} </td>
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