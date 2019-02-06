{!! Form::model($user, ['route'=>['profile.updateAcct', $user->profile->id], 'method'=>'POST']) !!}

	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Account Info</h3>
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<label for="username">Username</label>
							<input id="username" type="text" class="form-control input-sm" name="username" readonly="readonly" value="{{ $user->username }}">
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email">Email</label>
							<input id="email" type="text" class="form-control input-sm" name="email" value="{{ $user->email }}">
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group{{ $errors->has('public_email') ? ' has-error' : '' }}">
							<label for="public_email">Public Email</label>
							{{ Form::select('public_email', ['No','Yes'], null, ['class'=>'form-control input-sm']) }}
							<span class="help-block">Do you want to show your email address to all users?</span>
						</div>

						<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
							<label for="role">Role</label>
							<input id="role" type="text" class="form-control input-sm" name="role" readonly="readonly" value="{{ $user->role->name }}">
						</div>

						<div class="form-group{{ $errors->has('login_count') ? ' has-error' : '' }}">
							<label for="login_count">Login Count</label>
							<input id="login_count" type="text" class="form-control input-sm" name="login_count" readonly="readonly" value="{{ $user->login_count }}">
						</div>

						<div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
							<label for="created_at">Created On</label>
							@if($user->created_at)
								<input id="created_at" type="text" class="form-control input-sm" name="created_at" readonly="readonly" value="{{ $user->created_at }}">
							@else
								<input id="created_at" type="text" class="form-control input-sm" name="created_at" readonly="readonly" value="Unknown">
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				{{ Form::button('<i class="fa fa-save"></i> Update Account', array('type' => 'submit', 'class' => 'btn btn-xs btn-primary')) }}
			</div>
		</div>
	</div>



{{ Form::close() }}

@section('scripts')
	<script>
		//redirect to specific tab
		$(document).ready(function () {
			$('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
		});
	</script>
@endsection