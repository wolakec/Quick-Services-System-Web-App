<form name="test" method="post" action="{{ url('/oauth/access_token') }}" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="grant_type" value="password"/>
    <input type="hidden" name="client_id" value="client"/>
    <input type="hidden" name="scope" value="client"/>
    <input type="hidden" name="client_secret" value=""/>
    Username:<input type="text" name="username"/></br>
    Password:<input type="text" name="password"/></br>
    
    <input type="submit" value="submit" name="submit"/>
</form>