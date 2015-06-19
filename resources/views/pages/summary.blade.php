@extends('layouts.default')

@section('content')     
<h2>Account Created</h2>

<h4>Login Details:</h4>
Email: {{ $email }} </br>
Password: {{ $password }} </br>
@stop
