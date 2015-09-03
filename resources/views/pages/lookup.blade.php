@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form class="form-horizontal" method="post" action="{{ url($path).'/add'}} ">
                <div class="form-group">
                    <input type="text" class="form-control" id="Name" name="name" placeholder="Name">
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
        
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success"name="submit" value="submit" >Submit</button>
                </div>
            </form>
            <br><br><br><br>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table class="table table-bordered">
                        <thead>
                        <th>Name </th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($param as $item)
                            <tr>
                                <td>{{ $item->name }} </td>
                                <td>  <a href="{{ url($path.'/'.$item->id.'/edit/') }}">Edit</a></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop