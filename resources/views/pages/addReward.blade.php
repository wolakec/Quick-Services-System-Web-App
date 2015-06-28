@extends('layouts.default')

@section('content')
<div class="container">
    <form name="addReward" method="post" action="{{ url('/rewards/add') }}">
        Title: <input type="text" name="title"/></br>
        Description: <textarea name="description"></textarea></br>
        Cost: <input type="text" name="cost"/></br>
        
        <button type="submit" value="Submit" name="submit">Submit</button>
    </form>
</div>
@stop