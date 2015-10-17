
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center;">Clear Tokens</h4><br/>
             @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
    
@endif
            <form class="form-horizontal" name="addBroadcast" method="post" action="{{ url('/clear') }}">
                <div class="form-group">
                <button type="submit" value="Submit" name="submit" class="btn btn-success">Clear tokens</button>
                </div>
    </form>
        </div>
    </div>
</div>

