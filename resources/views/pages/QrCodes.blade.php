@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;">Add Company Information</h4><br/>
            <div class="row">
                @foreach($codes as $code)
                <div class="col-md-3">
                    {{ $code->id }}
                    <br>
                    <img src="{{ asset('/qrCodes/'.$code->body.'.png') }}" >
                </div>
                @endforeach
        </div>
    </div>
</div>
</div>
@stop


