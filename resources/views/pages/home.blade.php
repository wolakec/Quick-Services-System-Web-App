@extends('layouts.default')

@section('content')     
<div class="row">
<div class="dashboard-container">
    <div class="col-md-3">
        <div class="small-box bg-green">
                <div class="inner">
                  <h3>53</h3>
                  <p>sales of the day</p>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
    </div>
        
        <div class="col-md-3">
        <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>5</h3>
                  <p>Registration of day </p>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
    </div>
        
        <div class="col-md-3">
        <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">SDG</sup></h3>
                  <p>sales Profit</p>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
    </div>
        
        <div class="col-md-3">
        <div class="small-box bg-red">
                <div class="inner">
                  <h3>3</h3>
                  <p>notifications</p>
                </div>
                <a href="#" class="small-box-footer">see notification <i class="fa fa-arrow-circle-right"></i></a>
              </div>
    </div>
</div>
   <div class="dashboard-container  charts">
      
            <div class="col-lg-6">
                <canvas id="myChart2" class="chart" ></canvas>
            </div>
       
                <div class="col-lg-6">
                 <canvas id="myChart"></canvas>
             </div>
       
     
    </div>
</div><!--container -->
<script>
    
  var data = [
    {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    }
]

    var ctx = document.getElementById("myChart").getContext("2d");
    new Chart(ctx).Pie(data, {
    animateScale: false,
    responsive: true
});

var data2 = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};

 var ctx = document.getElementById("myChart2").getContext("2d");
   var myLineChart = new Chart(ctx).Line(data2,{
       responsive: true
   });

</script>
@stop
