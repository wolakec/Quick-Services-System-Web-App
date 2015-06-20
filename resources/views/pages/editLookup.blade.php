@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form  class="form-horizontal"method="post" action="{{ url($path.'/'.$param->id.'/edit')}} ">
                <div class="form-group">
                    <input type="text"class="form-control" name="name" value="{{ $param->name }}"/>
                </div>
                <input type="hidden" name="id" value="{{ $param->id }}"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
  
                <button type="submit"  class="btn btn-success" name="submit" value="submit">Submit</button>
 
            </form>
        </div>
    </div>
</div>
@stop