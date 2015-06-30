@extends('layouts.default')

@section('content')   

<div class="container outer-section">
    <div id="print-area">
        <div class="row pad-top font-big">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="{{ asset('Images/qsLogoWeb.png') }}" width="200" height="75" alt="Petromin Logo" />
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <strong>Support : </strong>info@petromin.com
                <br />
                <strong>Tel :</strong>+249-183-560-592<br />
                <strong>Fax :</strong>+249-183-560-550<br />
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                PETROMIN CORPORATION – SUDAN BRANCH
                Khartoum (3) – Street No. 39<br/>
                P.O. Box 15064
                <br />
                Khartoum-Sudan.<br />
            </div>
        </div>
        <br />
        <hr />
        <div class="row text-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                Account Created successfully , for any issues please contact &nbsp;<strong>info@petromin.com</strong>
            </div>
        </div>
        <hr/>
        <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6">              
                <h4>Personal Information:</h4>
                <strong>Name :</strong>  {{$employee->name}}  <br/>
                <strong>Tel :</strong>{{$employee->phone_1}}    <br/>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4>Login Details:</h4>
                <strong> Email:</strong> {{ $email }} <br/>
                <strong> Password:</strong> {{ $password }} <br/>
            </div>
        </div>
        <hr>
        <div class="row pad-bottom">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <a href="#" class="btn btn-success " style="width: 80px;float: right;margin-right: 100px;"> Print </a>
            </div>
        </div>
    </div>
</div>
@stop