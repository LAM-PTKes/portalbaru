<style type="text/css" media="screen">

    #peringkatc {
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
<div id='peringkatc'></div>

<script type="text/javascript">
    // Prepare demo data
    // Data is joined to map using value of 'hc-key' property by default.
    // See API docs for 'joinBy' for more info on linking data and map.
   
    // var data = [
    //     ['id-3700', 0],
    //     ['id-ac', 10],
    //     ['id-jt', 200],
    //     ['id-be', 300],
    //     ['id-bt', 4],
    //     ['id-kb', 5],
    //     ['id-bb', 6],
    //     ['id-ba', 7],
    //     ['id-ji', 8],
    //     ['id-ks', 9],
    //     ['id-nt', 10],
    //     ['id-se', 11],
    //     ['id-kr', 12],
    //     ['id-ib', 13],
    //     ['id-su', 14],
    //     ['id-ri', 15],
    //     ['id-sw', 16],
    //     ['id-ku', 17],
    //     ['id-la', 18],
    //     ['id-sb', 19],
    //     ['id-ma', 20],
    //     ['id-nb', 21],
    //     ['id-sg', 22],
    //     ['id-st', 23],
    //     ['id-pa', 24],
    //     ['id-jr', 25],
    //     ['id-ki', 26],
    //     ['id-1024', 27],
    //     ['id-jk', 28],
    //     ['id-go', 29],
    //     ['id-yo', 30],
    //     ['id-sl', 31],
    //     ['id-sr', 32],
    //     ['id-ja', 33],
    //     ['id-kt', 34]
    // ];

    var data = [
        ['id-3700', 0],
        @foreach($datatper as $v)
            @if ($v->nama_provinsi == 'Nanggroe Aceh Darussalam (NAD)')
                    ['id-ac', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Sumatera Utara')
                    ['id-su', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Sumatera Barat')
                    ['id-sb', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Sumatera Selatan')
                    ['id-sl', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Bengkulu')
                    ['id-be', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Jambi')
                    ['id-ja', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Riau')
                    ['id-ri', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Kepulauan Riau')
                    ['id-kr', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Bangka Belitung')
                    ['id-bb', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Lampung')
                    ['id-1024', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Banten')
                    ['id-bt', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'DKI Jakarta')
                    ['id-jk', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Jawa Barat')
                    ['id-jr', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Jawa Tengah')
                    ['id-jt', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Jawa Timur')
                    ['id-ji', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'DI Yogyakarta')
                    ['id-yo', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Bali')
                    ['id-ba', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Nusa Tenggara Barat (NTB)')
                    ['id-nb', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Nusa Tenggara Timur (NTT)')
                    ['id-nt', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Kalimantan Barat')
                    ['id-kb', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Kalimantan Selatan')
                    ['id-ks', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Kalimantan Tengah')
                    ['id-kt', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Kalimantan Timur')
                    ['id-ki', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Sulawesi Barat')
                    ['id-sr', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Sulawesi Selatan')
                    ['id-se', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Sulawesi Tenggara')
                    ['id-sg', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Sulawesi Tengah')
                    ['id-st', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Sulawesi Utara')
                    ['id-sw', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Gorontalo')
                    ['id-go', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Maluku Utara')
                    ['id-la', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Maluku')
                    ['id-ma', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Papua Barat')
                    ['id-ib', {{ $v->c }}],
            @elseif($v->nama_provinsi == 'Papua')
                    ['id-pa', {{ $v->c }}],
            @endif
        @endforeach
    ];
    // Create the chart
    Highcharts.mapChart('peringkatc', {
        chart: {
            map: 'countries/id/id-all'
        },

        title: {
            text: 'Akreditasi Perguruan Tinggi dengan Peringkat C/Baik'
        },

        // subtitle: {
        //     text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/id/id-all.js">Indonesia</a>'
        // },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
            min: 0
        },

        series: [{
            data: data,
            name: 'Jumlah Perguruan Tinggi dengan Peringkat C/Baik',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            // dataLabels: {
            //     enabled: true,
            //     format: '{point.name}'
            // }
        }]
    });

</script>
