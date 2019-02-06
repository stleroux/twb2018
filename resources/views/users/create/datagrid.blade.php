<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-4">
		<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
			{!! Form::label('username', 'Username', ['class'=>'required']) !!}
			{!! Form::text('username', null, ['class' => 'form-control', 'autofocus', 'onfocus' => 'this.focus();this.select()']) !!}
			<span class="text-danger">{{ $errors->first('username') }}</span>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-4">
		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			{!! Form::label('email', 'Email Address', ['class'=>'required']) !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
			<span class="text-danger">{{ $errors->first('email') }}</span>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-4">
		<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
			{{ Form::label('role_id', 'Role', ['class'=>'required']) }}
			{{ Form::select('role_id', $roles,[], array('class' => 'form-control')) }}
			<span class="text-danger">{{ $errors->first('role_id') }}</span>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-4">
		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			{{ Form::label('password', 'Password', ['class'=>'required']) }}
			{{ Form::password('password', ['class'=>'form-control']) }}
			<span class="text-danger">{{ $errors->first('password') }}</span>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-4">
		<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
			{{ Form::label('password_confirmation', 'Confirm Password', ['class'=>'required']) }}
			{{ Form::password('password_confirmation', ['class'=>'form-control']) }}
			<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
		</div>
	</div>
</div>