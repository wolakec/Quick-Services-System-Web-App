
@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Change Password</h4>
            <form  class="form-horizontal"method="post" action="{{ url('/changepassword/update') }}">
                <div class="form-group">
                    <label>old password</label>
                <input type="password" class="form-control" name="old_password"/>
                </div>
                <div class="form-group">
                    <label>new password</label>
                <input type="password" class="form-control" name="new_password"/>
                </div>
                <button type="submit"  class="btn btn-success" name="submit" value="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@stop