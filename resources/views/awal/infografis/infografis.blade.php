@extends('awal.template.app')
@section('title', 'Infografis LAM-PTKes')
@section('content')


<style type="text/css">
    #kedokteran {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    #farmasi {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    #gizi {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    #keslain {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    #kebidanan {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    #kedokgigi {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    #kedokhewan {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    #keperawatan {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    #kesmas {
        height: 500px; 
        min-width: 310px; 
        max-width: 100%; 
        margin: 0 auto; 
    }
    .loading {
        margin-top: 10em;
        text-align: center;
        color: gray;
    }

</style>

{{-- <script src="{{ asset('infografis/js/jquery-3.1.1.min.js') }}"></script> --}}
<script src="{{ asset('infografis/js/highmaps.js') }}"></script>
<script src="{{ asset('infografis/js/exporting.js') }}"></script>
<script src="{{ asset('infografis/js/id-all.js') }}"></script>
<script type="text/javascript">
    function showDiv(select){
       if(select.value==1){

        document.getElementById('A').style.display = "block";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "none";

       }else if(select.value==2){

        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "block";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "none";

       }else if(select.value==3){

        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "block";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "none";

       }else if(select.value==4){

        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "block";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "none";

       }else if(select.value==5){

        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "block";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "none";

       }else if(select.value==6){

        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "block";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "none";

       }else if(select.value==7){

        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "block";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "none";

       }else if(select.value==8){

        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "block";
        document.getElementById('I').style.display = "none";

       }else if(select.value==9){

        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "block";

       }else {
        document.getElementById('A').style.display = "none";
        document.getElementById('B').style.display = "none";
        document.getElementById('C').style.display = "none";
        document.getElementById('D').style.display = "none";
        document.getElementById('E').style.display = "none";
        document.getElementById('F').style.display = "none";
        document.getElementById('G').style.display = "none";
        document.getElementById('H').style.display = "none";
        document.getElementById('I').style.display = "none";

       } 
        
    }
</script>

<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-base text-left">
                        <h1>Infografis LAM-PTKes</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Infografis LAM-PTKes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <div class="section-empty section-item">
        <div class="container content">
             <div class="row">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="bidang ilmu">Bidang Ilmu</label>
                            <select name="jenjang" class="form-control" onchange="showDiv(this)" id="bidang ilmu">
                                <option value>-- Select --</option>
                                <option value="1">Farmasi</option>
                                <option value="2">Gizi</option>
                                <option value="3">Kebidanan</option>
                                <option value="4">Kedokteran</option>
                                <option value="5">Kedokteran Gigi</option>
                                <option value="6">Kedokteran Hewan</option>
                                <option value="7">Keperawatan</option>
                                <option value="8">Kesehatan Masyarakat</option>
                                <option value="9">Kesehatan Lain</option>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div id="A" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.farmasi')
                    </div>

                    <div id="B" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.gizi')
                    </div>

                    <div id="C" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.kebidanan')
                    </div>

                    <div id="D" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.kedokteran')
                    </div>

                    <div id="E" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.kedokgigi')
                    </div>

                    <div id="F" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.kedokhewan')
                    </div>

                    <div id="G" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.keperawatan')
                    </div>

                    <div id="H" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.kesmas')
                    </div>

                    <div id="I" style="display:none; width: 100%; height: auto;">
                        @include('awal.infografis.keslain')
                    </div>


                </div>
            </div> <!-- end row -->
        </div>
    </div>

@endsection
