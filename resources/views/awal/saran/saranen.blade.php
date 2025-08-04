@extends('awal.template.appen')
@section('title', 'Advice to IAAHEH')
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
                        <h2 class="">IAAHEH</h2>
                        
                        <hr class="space s" />

                         INDONESIAN ACCREDITATION AGENCY FOR HIGHER EDUCATION IN HEALTH

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
                                <p>Name</p>
                                <input id="name" name="nama" placeholder="Write Here" type="text" class="form-control form-value" required>
                            </div>
                            <div class="col-md-6">
                                <p>Institution</p>
                                <input id="institusi" name="institusi" placeholder="Write Here" type="text" class="form-control form-value" required>
                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-6">
                                <p>Email</p>
                                <input id="email" name="email" placeholder="Write Here" type="email" class="form-control form-value" required>
                            </div>
                            <div class="col-md-6">
                                <p>No Telp</p>
                                <input id="tlp" name="tlp" autocomplete="off" pattern="\d*" placeholder="Write Here" type="number" class="form-control form-value" required="">
                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-12">
                                <p>Complaints / Complaints </p>
                                <textarea id="keluhan" name="keluhan" placeholder="Write Here" class="form-control form-value" required></textarea>
                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-12">
                                <p>Suggestions / Expectations for Corrective Action</p>
                                <textarea id="saran" name="saran" placeholder="Write Here" class="form-control form-value" required></textarea>
                            </div>
                        </div>
                        <hr class="space xs" />
                        <div class="row">
                            <div class="col-md-12">
                                <p>Address</p>
                                <textarea id="alamat" name="alamat" placeholder="Write Here" class="form-control form-value" required></textarea>

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