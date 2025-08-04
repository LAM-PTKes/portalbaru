@extends('admin.template.app')
@section('title')
   Renstra
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
                $("#ekatbahasa_id").val(dt[1]);
                $("#ejudul").val(dt[2]);
                $("#edeskripsi").summernote('code', dt[{!! json_encode(3)!!}]);
                $("#epublikasi").val(dt[4]);
                $("#ngr").hide();
            });


        $('#deskripsi').summernote({
            placeholder: 'Note : Mohon Tidak Copas Langsung Dari Website/Word/Excel/Power Poin Dll. Jika Mau Copas dari Website/Word/Excel/Power Poin, Copas Dulu Ke Notepad/Sticky Note Baru Copas Ke Sini.',
            tabsize: 2,
            height: 200,
            toolbar: [
                    ['style', ['style']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],


          });


        $('#edeskripsi').summernote({
            placeholder: 'Note : Mohon Tidak Copas Langsung Dari Website/Word/Excel/Power Poin Dll. Jika Mau Copas dari Website/Word/Excel/Power Poin, Copas Dulu Ke Notepad/Sticky Note Baru Copas Ke Sini.',
            tabsize: 2,
            height: 200,
            toolbar: [
                    ['style', ['style']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],


          });

        });

    $(document).ready(function(){
        $('#myForm').on('submit', function(e) {

          if($('#deskripsi').summernote('isEmpty')) {
            // console.log('contents is empty, fill it!');
            $('#feedbackabs').show();
            // cancel submit
            e.preventDefault();
          }
          else {
             $('#feedbackabs').hide();
          }
        })
    });

    $(document).ready(function(){
        $('#myForm1').on('submit', function(e) {

          if($('#edeskripsi').summernote('isEmpty')) {
            // console.log('contents is empty, fill it!');
            $('#feedbackabs1').show();
            // cancel submit
            e.preventDefault();
          }
          else {
             $('#feedbackabs1').hide();
          }
        })
    });

</script>
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">LAM-PTKes </a></li>
            <li class="breadcrumb-item">Renstra</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span>{{ date('d F Y')}}</span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-table'></i> Rencana: <span class='fw-300'>Strategis</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tabel <span class="fw-300"><i>Renstra</i></span>
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
                            @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'Sekretariat')
                                <button type="button" class="btn btn-outline-success waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal">
                                    <span class="fal fa-plus mr-2"></span>
                                    Renstra
                                </button>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Form Input Renstra
                                                {{-- <small class="m-0 text-muted">
                                                    Below is a static modal example
                                                </small> --}}
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <form action="{{ route('renstra.store') }}" method="POST" accept-charset="utf-8" class="was-validated" enctype="multipart/form-data" id="myForm">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label class="form-label" for="judul">Judul</label>
                                                    <input type="text" name="judul"  id="judul" class="form-control is-valid" required >
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="katbahasa_id">Kategori Bahasa</label>
                                                    <select name="katbahasa_id"  id="katbahasa_id" class="form-control is-valid" required>
                                                        <option value>Select</option>
                                                        @foreach($katbhs as $bhs)
                                                            <option value="{{ $bhs->id }}">{{$bhs->namakbhs }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="publikasi">Status Publikasi</label>
                                                    <select name="publikasi" id="publikasi" class="form-control is-valid" required="">
                                                        <option value>Select</option>
                                                        <option value="Ya">Publish</option>
                                                        <option value="Tidak">Unpublish</option>
                                                    </select>
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="nfile">
                                                        File Renstra
                                                        <p style="color: red;">
                                                            * (Bentuk File PDF)
                                                        </p>
                                                    </label>
                                                    <input type="file" name="nfile" id="nfile" class="form-control is-valid" accept=".pdf" required="">
                                                    <div class="invalid-feedback">Wajib Di isi</div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="deskripsi">Ringkasan Hasil Riset</label>
                                                    <textarea name="deskripsi" id="deskripsi" class="form-control is-valid" required=""></textarea>
                                                    <div class="invalid-feedback" id="feedbackabs"><i class="fas fa-hand-point-up fa-2x"></i>   Wajib Di isi</div>
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
                                        @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'Sekretariat')
                                            <th><center>Action</center></th>
                                        @endif
                                        <th><center>File</center></th>
                                        <th><center>judul</center></th>
                                        <th><center>deskripsi</center></th>
                                        <th><center>Publikasi</center></th>
                                        <th><center>Kategori Bahasa</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($renstra as $rnt)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            @if(auth()->user()->role == 'Ngadimin' || auth()->user()->role == 'Sekretariat' )
                                                <td align="center">
                                                    <form action="{{route('renstra.destroy',$rnt)}}" method="post" id="delete_data_{{$rnt->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                        <button type="button" class="btn btn-sm btn-outline-warning a" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" value="{{ $rnt->id }},{{ $rnt->katbahasa_id }},{{ $rnt->judul }},{{ $rnt->deskripsi }},{{$rnt->publikasi }}">
                                                            <i class="fa fa-edit fa-2x"></i>
                                                        </button>
                                                        @if(auth()->user()->role == 'Ngadimin')
                                                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="hapus('{{$rnt->id }}')">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>
                                            @endif
                                            <td align="center">
                                                <a href="{{ route('secure.document.folder', ['folder' => 'renstra', 'filename' => $rnt->nfile]) }}" target="blank">
                                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="lihat">
                                                    <i class="fas fa-file-pdf fa-2x"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td >{{ $rnt->judul }}</td>
                                            <td >{!! $rnt->deskripsi !!}</td>
                                            <td align="center">{{ $rnt->publikasi }}</td>
                                            <td align="center">{{ $rnt->katbahasa->namakbhs }}</td>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Form Edit Renstra
                        {{-- <small class="m-0 text-muted">
                            Below is a static modal example
                        </small> --}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form action="{{ route('renstra.edit') }}" method="POST" accept-charset="utf-8" class="was-validated" enctype="multipart/form-data" id="myForm1">
                    {{ csrf_field() }}
                    {{-- {{ method_field('PATCH') }} --}}
                    {{ method_field('POST') }}

                    <div class="modal-body">

                        <div class="form-group" id="ngr">
                            <label class="form-label" for="idneg">Negoro</label>
                            <input type="text" name="id" id="idneg" class="form-control is-valid" required="" >
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="ejudul">Judul</label>
                            <input type="text" name="judul"  id="ejudul" class="form-control is-valid" required >
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="ekatbahasa_id">Kategori Bahasa</label>
                            <select name="katbahasa_id"  id="ekatbahasa_id" class="form-control is-valid" required>
                                <option value>Select</option>
                                @foreach($katbhs as $bhs)
                                    <option value="{{ $bhs->id }}">{{$bhs->namakbhs }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="epublikasi">Status Publikasi</label>
                            <select name="publikasi" id="epublikasi" class="form-control is-valid" required="">
                                <option value>Select</option>
                                <option value="Ya">Publish</option>
                                <option value="Tidak">Unpublish</option>
                            </select>
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="enfile">
                                File Renstra
                                <p style="color: red;">
                                    * (Bentuk File PDF)
                                </p>
                            </label>
                            <input type="file" name="nfile" id="enfile" class="form-control is-valid" accept=".pdf">
                            <div class="invalid-feedback">Wajib Di isi</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="edeskripsi">Ringkasan Hasil Riset</label>
                            <textarea name="deskripsi" id="edeskripsi" class="form-control is-valid" required=""></textarea>
                            <div class="invalid-feedback" id="feedbackabs1"><i class="fas fa-hand-point-up fa-2x"></i>   Wajib Di isi</div>
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
