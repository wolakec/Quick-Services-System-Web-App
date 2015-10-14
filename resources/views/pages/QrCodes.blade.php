@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;">QR codes List</h4><br/>
            <a href="/codes/print/all" class="btn btn-primary">Print All</a>
            <hr>
            @if (count($codes) == 0)
            {{ "you need to generate some codes" }}
            @endif
            <div class="row">
                @foreach($codes as $code)
                <div class="col-md-4">
                    {{ $code->id }}
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
           <form class="form-horizontal" name="print{{ $code->id }}" method="post" action="{{ url('/codes/print/one') }}">
               <input hidden="hidden" type="text" value="{{ $code->id }}" name="id">
                            
                            <button type="submit" value="Submit" name="submit" class="btn btn-success" ><span class="glyphicon glyphicon-print"></span></button>
                    </form>
                    </div>
                    <div class="panel-body text-center" id="printThis">
                  <img src="{{ asset('/app/qrCodes/'.$code->body.'.png') }}" >
                </div>
                </div>    
                    
                </div>
                
                @endforeach
                
        </div>
    </div>
</div>
</div>

@stop


