@extends('layouts.app')

@section ('title','Edit User')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('users.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('users.index') }}">Users</a></li>
	<li class="active"><span>Edit User</span></li>
@stop

@section('content')
	{!! Form::model($user, ['route'=>['users.update', $user->id], 'method' => 'PUT']) !!}
		{{-- <input type="hidden" value="{{ $ref }}" name="ref" size="50"/> --}}



		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">User Details</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
							{!! Form::label("username", "Username", ['class'=>'required']) !!}
							{!! Form::text("username", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}
							<span class="text-danger">{{ $errors->first('username') }}</span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							{!! Form::label("email", "Email Address", ['class'=>'required']) !!}
							{!! Form::text("email", null, ["class" => "form-control", "autofocus", 'onfocus' => 'this.focus();this.select()']) !!}
							<span class="text-danger">{{ $errors->first('email') }}</span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-4">
						<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
							{{ Form::label('role_id', 'Role', ['class'=>'required']) }}
							{{ Form::select('role_id', $roles, null, ['class'=>'form-control']) }}
							<span class="text-danger">{{ $errors->first('role_id') }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>


@stop

@section('blocks')
		@include('users.edit.controls')
	{!! Form::close() !!}
@endsection

@section ('scripts')
{{--   <script type="text/javascript" src="/js/jquery.datetimepicker.full.min.js"></script>
	<script>
		$("#datetime").datetimepicker({
			step: 30,
			showOn: 'button',
			buttonImage: '',
			buttonImageOnly: true,
			format:'Y-m-d H:i',
			lang:'ru'
		});
	</script> --}}
@stop

	
