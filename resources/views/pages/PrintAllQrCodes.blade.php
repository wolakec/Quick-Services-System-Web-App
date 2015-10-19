@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;">QR codes List</h4><br/>
            <a href="/codes/print/all/go" onclick='printDiv("printAll")' class="btn btn-primary">Print</a>
            <hr>
            <div class="row" id="printAll">
                @foreach($codes as $code)
                <div class="col-md-6">
                    {{ $code->id }}
                  <img src="{{ asset('/app/qrCodes/'.$code->body.'.png') }}" >
                </div>
                
                @endforeach
        </div>
    </div>
</div>
</div>
@stop


