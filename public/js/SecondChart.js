$(function () {
    $('#SecondChart').highcharts({
        title: {
            text: 'Daily Average sales',
            x: 0 //center
        },
        subtitle: {
            text: '',
            x: 0
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6',
                '7', '8', '9', '10', '11', '12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31']
        },
        yAxis: {
            title: {
                text: 'Amount of  Sales '
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [ {
            name: 'Sales',
            data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0,2,4,6,44,6.6,2.2,2.4,22.4,4.5,5.6,3.5,5.0,6.7,2.8,3.5,4.6,1.5,33,3.9]
        }, 
           ]
    });
});