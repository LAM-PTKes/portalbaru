var data = [
    ['id-3700', 0],
    ['id-ac', 1],
    ['id-jt', 200],
    ['id-be', 300],
    ['id-bt', 4],
    ['id-kb', 5],
    ['id-bb', 6],
    ['id-ba', 7],
    ['id-ji', 8],
    ['id-ks', 9],
    ['id-nt', 10],
    ['id-se', 11],
    ['id-kr', 12],
    ['id-ib', 13],
    ['id-su', 14],
    ['id-ri', 15],
    ['id-sw', 16],
    ['id-ku', 17],
    ['id-la', 18],
    ['id-sb', 19],
    ['id-ma', 20],
    ['id-nb', 21],
    ['id-sg', 22],
    ['id-st', 23],
    ['id-pa', 24],
    ['id-jr', 250],
    ['id-ki', 26],
    ['id-1024', 27],
    ['id-jk', 28],
    ['id-go', 29],
    ['id-yo', 30],
    ['id-sl', 31],
    ['id-sr', 32],
    ['id-ja', 33],
    ['id-kt', 34]
];

// Create the chart
Highcharts.mapChart('container', {
    chart: {
        map: 'countries/id/id-all'
    },

    title: {
        text: 'Akreditasi LAM-PTKes'
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
        name: 'Jumlah Perguruan Tinggi',
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