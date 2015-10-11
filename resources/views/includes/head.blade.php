<link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/jquery-1.8.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.sumoselect.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/highcharts.js') }}"></script>
<link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/Style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{asset('js/SecondChart.js')}}"></script>
<script src="{{asset('js/FirstChart.js')}}"></script>
<script src="{{asset('js/thirdChart.js')}}"></script>
<script src="{{ asset('js/angular.min.js') }}"></script>
<script src="{{ asset('js/ui-bootstrap-0.13.0.min.js') }}"></script>
<script src="{{ asset('js/clientForm.js') }}"></script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script>
       function printDiv(ele) {
            var printContents = document.getElementById(ele).innerHTML;    
            var originalContents = document.body.innerHTML;      
            document.body.innerHTML = printContents;     
            window.print();     
            document.body.innerHTML = originalContents;
   }
</script>
