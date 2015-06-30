@extends('layouts.default')

@section('content')
<div class="container">
    <form name="editReward" method="post" action="{{ url('/rewards/'.$id.'/edit') }}">
        Title: <input type="text" name="title" value="{{ $reward->title }}"/></br>
        Description: <textarea name="description">{{ $reward->description }}</textarea></br>
        Cost: <input type="text" name="cost" value="{{ $reward->cost }}"/></br>
        
        <button type="submit" value="Submit" name="submit">Submit</button>
    </form>
</div>
@stop