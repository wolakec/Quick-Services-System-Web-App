@extends('layouts.guest')

@section('content')
<div class="loginBG container-fluid ">
	<div class="row">
            <div class="col-md-6 col-md-offset-3 loginPanle" style="">
			<div class="panel panel-default">
                            <div class="panel-heading text-center" ><h4 style="text-align: center;">Quick Services System</h4>
                                <span class=""><img class=" " style="max-height: 70px; margin-bottom: 50px;" src="{{ asset('Images/qsLogoWeb.png') }}"></span>
                            </div>
				<div class="panel-body">
<!--					@if (count($errors) > 0)
						<div class="alert alert-danger">
						
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif-->

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
                                                   
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
                                                                <div class="text-danger">{{ $errors->first('email') }}</div>
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
                                                     
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
                                                                <div class="text-danger">{{ $errors->first('password') }}</div>
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-default ">Login</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

</script>
@endsection
