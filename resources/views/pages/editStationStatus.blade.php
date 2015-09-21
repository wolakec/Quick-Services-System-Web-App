@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Edit Station Status</h4><br/>
            <form name="editStationStatus" class="form-horizontal" method="post" action="{{ url('/stations/'.$station->id.'/status/edit') }}">
                <textarea name="message"/>{{ $status->message }}</textarea></br>
                Open
                <input type="radio" name="is_open" value="1"
                          @if($status->is_open)
                            checked
                          @endif  
                          />
                Closed
                <input type="radio" name="is_open" value="0"
                          @if(!$status->is_open)
                            checked
                          @endif  
                          /></br>
                Petrol Available
                <input type="radio" name="has_petrol" value="1"
                          @if($status->has_petrol)
                            checked
                          @endif  
                          />
                Unavailable
                <input type="radio" name="has_petrol" value="0"
                          @if(!$status->has_petrol)
                            checked
                          @endif  
                          /></br>
               Diesel Available
                <input type="radio" name="has_diesel" value="1"
                          @if($status->has_diesel)
                            checked
                          @endif  
                          />
                Unavailable
                <input type="radio" name="has_diesel" value="0"
                          @if(!$status->has_diesel)
                            checked
                          @endif  
                          /></br>
                            
            <button type="submit" value="submit" name="submit"class="btn btn-success"> Submit</button>
        </div>
        </form>
    </div>
</div>
</div>
@stop
