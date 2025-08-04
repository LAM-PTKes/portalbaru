@extends('awal.template.app')
@section('title', 'Saran untuk LAM-PTKes')
@section('content')
<script type="text/javascript">
    $(document).ready(function(){
            $("#example-modal-alert").modal('show');

        });
</script>
    <div class="section-empty">
        <div class="container content">
            <div class="row">
                @include('admin.template.partials._alerts')
                <div class="col-md-8 col-center text-center">

                        <hr class="space" />
                        <h2 class="">LAM-PTKes</h2>
                        
                        <hr class="space s" />

                         LEMBAGA AKREDITASI MANDIRI PENDIDIKAN TINGGI KESEHATAN INDONESIA <br> 
                         (INDONESIAN ACCREDITATION AGENCY FOR HIGHER EDUCATION IN HEALTH)

                        <hr class="space m" />
                        <hr class="space xs" />

                    <hr class="space xs" />
                    <br>
                    <br>
                     <form action="{{ route('saran.store') }}" class="form-box form-ajax" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="row">
                            <div class="col-md-6">
                                <p>Nama Lengkap</p>
                                <input id="name" name="nama" placeholder="Isi Disini" type="text" class="form-control form-value" required>
                            </div>
                            <div class="col-md-6">
                                <p>Institution</p>
                                <input id="institusi" name="institusi" placeholder="Isi Disini" type="text" class="form-control form-value" required>
                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-6">
                                <p>Email</p>
                                <input id="email" name="email" placeholder="Isi Disini" type="email" class="form-control form-value" required>
                            </div>
                            <div class="col-md-6">
                                <p>No Telp</p>
                                <input id="tlp" name="tlp" autocomplete="off" pattern="\d*" placeholder="Isi Disini" type="number" class="form-control form-value" required="">
                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-12">
                                <p>Keluhan/Pengaduan </p>
                                <textarea id="keluhan" name="keluhan" placeholder="Isi Disini" class="form-control form-value" required></textarea>
                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-12">
                                <p>Saran/Harapan Tindakan Perbaikan</p>
                                <textarea id="saran" name="saran" placeholder="Isi Disini" class="form-control form-value" required></textarea>
                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-12">
                                <p>Alamat</p>
                                <textarea id="alamat" name="alamat" placeholder="Isi Disini" class="form-control form-value" required></textarea>

                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-12">
                                
                                <button type="submit" class="anima-button btn-sm btn" name='submit' >
                                    <i class="fa fa-send-o"></i> 
                                    Send
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection