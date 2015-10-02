@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Edit Service Availability</h4><br/>
            <form name="editServiceAvailability" class="form-horizontal" method="post" action="{{ url('/stations/'.$station->id.'/services/types/availability/edit') }}">
                <table class="table table-bordered"/>
                
                    @foreach($serviceTypes as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td>
                        Open
                        <input type="radio" name="serviceTypes[{{ $type->service_type_id }}]is_available" value="1"
                                  @if($type->is_available)
                                    checked
                                  @endif  
                                  />
                        Closed
                        <input type="radio" name="serviceTypes[{{ $type->service_type_id }}]is_available" value="0"
                                  @if(!$type->is_available)
                                    checked
                                  @endif  
                                  /></br> 
                        </td>
                    </tr>
                     @endforeach
                </table>
            <button type="submit" value="submit" name="submit"class="btn btn-success"> Submit</button>
        </div>
        </form>
    </div>
</div>
</div>
@stop
