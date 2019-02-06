@extends ('layouts.app')

@section ('title', 'Login')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
@stop

{{-- @section('breadcrumb')
@stop --}}

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}

						@if($errors->count() > 0)
							<div class="alert alert-danger text-center">
								<strong>{{ $errors->first('email') }}</strong>
							</div>
						@endif

						<div class="form-group">
							<label for="email" class="col-md-4 control-label">E-Mail Address / Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email" placeholder="E-Mail / Username" value="{{ old('email') }}" required autofocus>
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Login
								</button>

								<a class="btn btn-link" href="{{ route('password.request') }}">
									Forgot Your Password?
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
