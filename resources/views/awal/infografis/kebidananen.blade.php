
                            
        <div id='kebidanan'>
            
        </div>
        <div class="card-box table-responsive">
            <table id="key-table2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Province Name</th>
                        <th>Number of Universities</th>
                        <th>Rank A</th>
                        <th>Rank B</th>
                        <th>Rank C</th>
                        <th>Not Accredited</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($kebidanan as $v)
                    <tr>
                        <td align="center">
                            {{ $no++ }}
                        </td>
                        <td>
                            {{ $v['NAMA_PROVINSI'] }}
                        </td>
                        <td align="center">
                            {{ $v['JUMLAH'] }}
                        </td>
                        <td align="center">
                            {{ $v['A'] }}
                        </td>
                        <td align="center">
                            {{ $v['B'] }}
                        </td>
                        <td align="center">
                            {{ $v['C'] }}
                        </td>
                        <td align="center">
                            {{ $v['TT'] }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

<script type="text/javascript">
    // Prepare demo data
    // Data is joined to map using value of 'hc-key' property by default.
    // See API docs for 'joinBy' for more info on linking data and map.
    var data=[
            ['id-3700', 0],
            @foreach($kebidanan as $v)
                @if ($v['NAMA_PROVINSI'] == 'Nanggroe Aceh Darussalam (NAD)')
                        ['id-ac', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Sumatera Utara')
                        ['id-su', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Sumatera Barat')
                        ['id-sb', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Sumatera Selatan')
                        ['id-sl', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Bengkulu')
                        ['id-be', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Jambi')
                        ['id-ja', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Riau')
                        ['id-ri', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Kepulauan Riau')
                        ['id-kr', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Bangka Belitung')
                        ['id-bb', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Lampung')
                        ['id-1024', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Banten')
                        ['id-bt', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'DKI Jakarta')
                        ['id-jk', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Jawa Barat')
                        ['id-jr', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Jawa Tengah')
                        ['id-jt', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Jawa Timur')
                        ['id-ji', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'DI Yogyakarta')
                        ['id-yo', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Bali')
                        ['id-ba', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Nusa Tenggara Barat (NTB)')
                        ['id-nb', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Nusa Tenggara Timur (NTT)')
                        ['id-nt', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Kalimantan Barat')
                        ['id-kb', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Kalimantan Selatan')
                        ['id-ks', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Kalimantan Tengah')
                        ['id-kt', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Kalimantan Timur')
                        ['id-ki', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Sulawesi Barat')
                        ['id-sr', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Sulawesi Selatan')
                        ['id-se', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Sulawesi Tenggara')
                        ['id-sg', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Sulawesi Tengah')
                        ['id-st', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Sulawesi Utara')
                        ['id-sw', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Gorontalo')
                        ['id-go', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Maluku Utara')
                        ['id-la', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Maluku')
                        ['id-ma', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Papua Barat')
                        ['id-ib', {{$v['JUMLAH'] }}],
                @elseif($v['NAMA_PROVINSI'] == 'Papua')
                        ['id-pa', {{$v['JUMLAH'] }}],
                @endif
            @endforeach
    ];

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
    // Create the chart
    Highcharts.mapChart('kebidanan', {
        chart: {
            map: 'countries/id/id-all'
        },

        title: {
            text: 'IAAHEH Accreditation for Midwifery'
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
            name: 'Number of Universities',
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
