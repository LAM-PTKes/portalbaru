<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="grid-list one-row-list">
            <figure class="highcharts-figure">
              <div id="pemilikpt"></div>
            </figure>
        </div>
    </div>
</div>

<script type="text/javascript">

// Data retrieved from https://www.ssb.no/statbank/table/10467/
var chart = Highcharts.chart('pemilikpt', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Jumlah Peringkat Per PTN atau PTS'
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
        categories: [
                      'Peringkat A',
                      'Peringkat B',
                      'Peringkat C',
                      'Peringkat Unggul',
                      'Peringkat Baik Sekali',
                      'Peringkat Baik',
                      'Tidak Terkareditasi'
                    ],
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
        name: 'PTN',
        data: [
                {{ collect($datatpp)->where('peringkat','A')->pluck('ptn')->max() }},
                {{ collect($datatpp)->where('peringkat','B')->pluck('ptn')->max() }},
                {{ collect($datatpp)->where('peringkat','C')->pluck('ptn')->max() }},
                {{ collect($datatpp)->where('peringkat','UNGGUL')->pluck('ptn')->max() }},
                {{ collect($datatpp)->where('peringkat','BAIK SEKALI')->pluck('ptn')->max() }},
                {{ collect($datatpp)->where('peringkat','BAIK')->pluck('ptn')->max() }},
                {{ collect($datatpp)->where('peringkat','TIDAK TERAKREDITASI')->pluck('ptn')->max() }}
              ]
    },
    {
        name: 'PTS',
        data: [
                {{ collect($datatpp)->where('peringkat','A')->pluck('pts')->max() }},
                {{ collect($datatpp)->where('peringkat','B')->pluck('pts')->max() }},
                {{ collect($datatpp)->where('peringkat','C')->pluck('pts')->max() }},
                {{ collect($datatpp)->where('peringkat','UNGGUL')->pluck('pts')->max() }},
                {{ collect($datatpp)->where('peringkat','BAIK SEKALI')->pluck('pts')->max() }},
                {{ collect($datatpp)->where('peringkat','BAIK')->pluck('pts')->max() }},
                {{ collect($datatpp)->where('peringkat','TIDAK TERAKREDITASI')->pluck('pts')->max() }}
              ]
    }
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