$(function () {
    $('#thirdChart').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Distribuation<br>Area',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'City',
            innerSize: '50%',
            data: [
                ['Madani',   45.0],
                ['Sennar',       26.8],
                ['Khartoum', 12.8],
                ['Port Sudan',    8.5],
                ['Kassla',     6.2],
                {
                    name: 'Dungla',
                    y: 0.7,
                    dataLabels: {
                        enabled: false
                    }
                }
            ]
        }]
    });
});
