@extends('awal.template.app')
@section('title', 'Statistik - LAM-PTKes')
@section('content')

<script type="text/javascript">
        $(document).ready(function(){
            
            $('#pilihgrafik').change(function(){
                if($('#pilihgrafik').val() == '1') {
                    $('#petatimp').show();
                    $('#datatimp').show();
                    $('#peringkata').hide();
                    $('#peringkatb').hide();
                    $('#peringkatc').hide();
                    $('#peringkatall').hide();
                    $('#pemilikpt').hide();
                }else if($('#pilihgrafik').val() == '2') {
                    $('#peringkata').show();
                    $('#peringkatb').hide();
                    $('#peringkatc').hide();
                    $('#peringkatall').hide();
                    $('#petatimp').hide();
                    $('#datatimp').hide();
                    $('#pemilikpt').hide();
                }else if($('#pilihgrafik').val() == '3') {
                    $('#peringkatb').show();
                    $('#peringkata').hide();
                    $('#peringkatc').hide();
                    $('#peringkatall').hide();
                    $('#petatimp').hide();
                    $('#datatimp').hide();
                    $('#pemilikpt').hide();
                }else if($('#pilihgrafik').val() == '4') {
                    $('#peringkatc').show();
                    $('#peringkata').hide();
                    $('#peringkatb').hide();
                    $('#peringkatall').hide();
                    $('#petatimp').hide();
                    $('#datatimp').hide();
                    $('#pemilikpt').hide();
                }else if($('#pilihgrafik').val() == '5') {
                    $('#peringkatall').show();
                    $('#peringkata').hide();
                    $('#peringkatb').hide();
                    $('#peringkatc').hide();
                    $('#petatimp').hide();
                    $('#datatimp').hide();
                    $('#pemilikpt').hide();
                }else if($('#pilihgrafik').val() == '6') {
                    $('#pemilikpt').show();
                    $('#peringkatall').hide();
                    $('#peringkata').hide();
                    $('#peringkatb').hide();
                    $('#peringkatc').hide();
                    $('#petatimp').hide();
                    $('#datatimp').hide();
                } else {
                    $('#petatimp').hide();
                    $('#peringkata').hide(); 
                    $('#peringkatb').hide(); 
                    $('#peringkatc').hide(); 
                    $('#peringkatall').hide();
                    $('#pemilikpt').hide();
                } 
            }).trigger('change');

        });
</script>
	<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Statistik</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Statistik</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <div class="section-empty section-item">
        <div class="container content">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="grid-list one-row-list">
                      <select id="pilihgrafik" class="form-control">
                        <option value="">Select</option>
                        <option value="1">Tim Penilai LAM-PTKes</option>
                        <option value="2">Peringkat Akreditasi Perguruan Tinggi dengan Nila A/Unggul</option>
                        <option value="3">Peringkat Akreditasi Perguruan Tinggi dengan Nila B/Baik Sekali</option>
                        <option value="4">Peringkat Akreditasi Perguruan Tinggi dengan Nila C/Baik</option>
                        <option value="5">Peringkat Akreditasi Perguruan Tinggi dengan Semua Nilai</option>
                        <option value="6">Peringkat Akreditasi Perguruan Tinggi Berdasarkan Per Pemilik</option>
                      </select>

                    </div>
                </div>
            </div>
            <br>

            <figure class="highcharts-figure" id="datatimp">
              <div id="xxx"></div>
            </figure>

            <br>
            <div id="petatimp">
                @include('awal.statistik.petatimp')
                <br>
                <div class="card-box table-responsive">
                  <table id="key-table2" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Provinsi</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datatppp as $v)
                      <tr>
                        <td align="center">
                          {{ $no++ }}
                        </td>
                        <td>
                          {{ $v->nama_provinsi }}
                        </td>
                        <td align="center">
                          {{ $v->total }} 
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div id="peringkata">
                @include('awal.statistik.peringkata')
              <br>
              <div class="card-box table-responsive">
                <table id="key-table3" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Provinsi</th>
                      <th>Peringkat A/Unggul</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datatper as $v)
                    <tr>
                      <td align="center">
                        {{ $no1++ }}
                      </td>
                      <td>
                        {{ $v->nama_provinsi }}
                      </td>
                      <td align="center">
                        {{ $v->a }} 
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div id="peringkatb">
                @include('awal.statistik.peringkatb')
              <br>
              <div class="card-box table-responsive">
                <table id="key-table4" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Provinsi</th>
                      <th>Peringkat B/Baik Sekali</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datatper as $v)
                    <tr>
                      <td align="center">
                        {{ $no2++ }}
                      </td>
                      <td>
                        {{ $v->nama_provinsi }}
                      </td>
                      <td align="center">
                        {{ $v->b }} 
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div id="peringkatc">
              @include('awal.statistik.peringkatc')
              <br>
              <div class="card-box table-responsive">
                <table id="key-table5" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Provinsi</th>
                      <th>Peringkat C/Baik</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datatper as $v)
                    <tr>
                      <td align="center">
                        {{ $no3++ }}
                      </td>
                      <td>
                        {{ $v->nama_provinsi }}
                      </td>
                      <td align="center">
                        {{ $v->c }} 
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div id="peringkatall">
                @include('awal.statistik.peringkatall')
                <br>
                <div class="card-box table-responsive">
                    <table id="key-table6" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Provinsi</th>
                                <th>Peringkat A/Unggul</th>
                                <th>Peringkat B/Unggul</th>
                                <th>Peringkat C/Unggul</th>
                                <th>Tidak Terakreditasi</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datatper as $v)
                            <tr>
                                <td align="center">
                                    {{ $no4++ }}
                                </td>
                                <td>
                                    {{ $v->nama_provinsi }}
                                </td>
                                <td align="center">
                                    {{ $v->a }} 
                                </td>
                                <td align="center">
                                    {{ $v->b }} 
                                </td>
                                <td align="center">
                                    {{ $v->c }} 
                                </td>
                                <td align="center">
                                    {{ $v->tt }} 
                                </td>
                                <td align="center">
                                    {{ $v->a+$v->b+$v->c+$v->tt }} 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="pemilikpt">
                @include('awal.statistik.pemilikpt')
                <br>

              <div class="card-box table-responsive">
                <table id="key-table7" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Peringkat</th>
                      <th>PTN</th>
                      <th>PTS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(collect($datatpp)->sort() as $v)
                    <tr>
                      <td align="center">
                        {{ $no6++ }}
                      </td>
                      <td>
                        {{ $v->peringkat }}
                      </td>
                      <td align="center">
                        {{ $v->ptn }} 
                      </td>
                      <td align="center">
                        {{ $v->pts }} 
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

        </div>
    </div>
<style type="text/css">
  .highcharts-figure,
  .highcharts-data-table table {
          height: 500px; 
          min-width: 310px; 
          max-width: 100%; 
          margin: 0 auto; 
  }

  .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #ebebeb;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
  }

  .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
  }

  .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
      padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
      background: #f1f7ff;
  }

  #button-bar {
      min-width: 310px;
      max-width: 800px;
      margin: 0 auto;
  }

</style>

<script type="text/javascript">
  // Data retrieved from https://www.ssb.no/statbank/table/10467/
var chart = Highcharts.chart('xxx', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Jumlah Tim Penilai Berdasarkan Bidang Ilmu'
    },

    // subtitle: {
    //     text: 'Resize the frame or click buttons to change appearance'
    // },

    legend: {
        align: 'right',
        verticalAlign: 'middle',
        layout: 'vertical'
    },

    xAxis: {
        categories: ['Bidang Ilmu'],
        labels: {
            x: -10
        }
    },

    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Jumlah'
        }
    },

    series: [
    {
        name: 'Kedokteran',
        data: [{{ collect($datatppb)->pluck('kedokteran')->max() }}]
    },
    {
        name: 'Kedokteran Gigi',
        data: [{{ collect($datatppb)->pluck('kedokteran_gigi')->max() }}]
    },
    {
        name: 'Keperawatan',
        data: [{{ collect($datatppb)->pluck('keperawatan')->max() }}]
    },
    {
        name: 'Kebidanan',
        data: [{{ collect($datatppb)->pluck('kebidanan')->max() }}]
    },
    {
        name: 'Farmasi',
        data: [{{ collect($datatppb)->pluck('farmasi')->max() }}]
    },
    {
        name: 'Kesehatan Masyarakat',
        data: [{{ collect($datatppb)->pluck('kesehatan_masyarakat')->max() }}]
    },
    {
        name: 'Gizi',
        data: [{{ collect($datatppb)->pluck('gizi')->max() }}]
    },
    {
        name: 'Kesehatan Lain',
        data: [{{ collect($datatppb)->pluck('kesehatan_lain')->max() }}]
    },
    {
        name: 'Kedokteran Hewan',
        data: [{{ collect($datatppb)->pluck('kedokteran_hewan')->max() }}]
    },
    // {
    //     name: 'Belum Mengisi',
    //     data: [{{ collect($datatppb)->pluck('belum_isi')->max() }}]
    // },
    ],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    layout: 'horizontal'
                },
                yAxis: {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -5
                    },
                    title: {
                        text: null
                    }
                },
                subtitle: {
                    text: null
                },
                credits: {
                    enabled: false
                }
            }
        }]
    }
});

</script>

@endsection