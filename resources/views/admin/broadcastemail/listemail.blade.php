@extends('admin.template.app')
@section('title')
    List Email
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



        $(document).ready(function(){

            $(':button[class="btn btn-sm btn-outline-warning a"]').click(function() {
                // console.log($(this).attr('value'));
                var dt = $(this).attr('value').split(','); 

                $("#modalnegara").modal('show');
                $("#idneg").val(dt[0]);
                $("#enama").val(dt[1]);
                $("#eemail").val(dt[2]);
                $("#ekatemail_id").val(dt[3]);
                $("#ngr").hide();
            });

        });
</script>
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Broadcast Email </a></li>
            <li class="breadcrumb-item">List Email</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> List: <span class='fw-300'>Email</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>List Email</i></span>
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
                            @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'SPMI' || auth()->user()->role == 'RnD')
                                <button type="button" class="btn btn-outline-success waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal">
                                    <span class="fal fa-plus mr-2"></span> 
                                    List Email
                                </button>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Form Input List Email 
                                                {{-- <small class="m-0 text-muted">
                                                    Below is a static modal example
                                                </small> --}}
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <form action="{{ route('listemail.store') }}" method="POST" accept-charset="utf-8" class="was-validated" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label class="form-label" for="nama">Nama</label>
                                                    <input type="text" name="nama"  id="nama" class="form-control is-valid" required >
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" name="email"  id="email" class="form-control is-valid" required >
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="katemail_id">Email</label>
                                                    <select name="katemail_id"  id="katemail_id" class="form-control is-valid" required>
                                                        <option value>Select</option>
                                                        @foreach($katemail as $kte)
                                                            <option value="{{ $kte->id }}">{{$kte->nama_kat }}</option>
                                                        @endforeach
                                                    </select>
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
                           
                            <br><br> 
                            

                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="bg-primary-600">
                                    <tr>
                                        <th><center>No</center></th>
                                        @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'SPMI' || auth()->user()->role == 'RnD')
                                            <th><center>Action</center></th>
                                        @endif
                                        <th><center>Nama</center></th>
                                        <th><center>Email</center></th>
                                        <th><center>Kategori Email</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listemail as$lsm)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'SPMI' || auth()->user()->role == 'RnD')
                                                <td align="center">
                                                    <form action="{{route('listemail.destroy',$lsm)}}" method="post" id="delete_data_{{$lsm->id }}">
                                                    {{ csrf_field() }}                          
                                                    {{ method_field('DELETE') }}
                                                        <button type="button" class="btn btn-sm btn-outline-warning a" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" value="{{$lsm->id }},{{ $lsm->nama }},{{ $lsm->email }},{{ $lsm->katemail_id }}">
                                                            <i class="fa fa-edit fa-2x"></i> 
                                                        </button>
                                                        @if(auth()->user()->role == 'Ngadimin')
                                                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="hapus('{{$lsm->id }}')">
                                                                <i class="fas fa-trash-alt fa-2x"></i> 
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>
                                            @endif
                                            <td >{{$lsm->nama }}</td>
                                            <td >{{$lsm->email }}</td>
                                            <td >{{$lsm->katemail->nama_kat }}</td>
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
    <div class="modal fade" id="modalnegara" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Form Edit list Email
                        {{-- <small class="m-0 text-muted">
                            Below is a static modal example
                        </small> --}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form action="{{ route('listemail.edit') }}" method="GET" accept-charset="utf-8" class="was-validated" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-body">

                        <div class="form-group" id="ngr">
                            <label class="form-label" for="idneg">Negoro</label>
                            <input type="text" name="id" id="idneg" class="form-control is-valid" required="" >
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="enama">Nama</label>
                            <input type="text" name="nama"  id="enama" class="form-control is-valid" required >
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="eemail">Email</label>
                            <input type="email" name="email"  id="eemail" class="form-control is-valid" required >
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="ekatemail_id">Kategori Email</label>
                            <select name="katemail_id"  id="ekatemail_id" class="form-control is-valid" required>
                                <option value>Select</option>
                                @foreach($katemail as $kte)
                                    <option value="{{ $kte->id }}">{{ $kte->nama_kat }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                            <span class="fal fa-times mr-1"></span> Close
                        </button>
                        <button type="submit" class="btn btn-outline-success">
                            <span class="fal fa-save mr-2"></span> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
@endsection