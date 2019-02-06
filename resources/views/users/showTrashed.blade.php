@extends ('layouts.app')

@section('title', '| Show User')

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('users.index') }}">Users</a></li>
	<li class="active"><span>Show User</span></li>
@endsection

@section('sectionSidebar')
	@include('users.sidebar')
@endsection

@section('content')
		<div class="col-xs-12 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					User Account Information
				</h4>
			</div>

			<table class="table table-hover">
				<tr>
					<th>Username</th>
					<td>{{ $user->username }}</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>{{ $user->email }}</td>               
				</tr>
				<tr>
					<th>Role</th>
					<td>{{ $user->role->name }}</td>
				</tr>
				<tr>
					<th>Public Email</th>
					<td>{{ $user->public_email ? "Yes" : "No" }}</td>
				</tr>
				<tr>
					<th>Logins</th>
					<td>{{ $user->login_count }}</td>
				</tr>
			</table>

		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					User Account Information
				</h4>
			</div>
		
			<table class="table table-hover">
				<tr>
					<th>First Name</th>
					<td>{{ $user->profile->first_name }}</td>
				</tr>
				<tr>
					<th>Last Name</th>
					<td>{{ $user->profile->last_name }}</td>
				</tr>
			</table>

		</div>
	</div>

	@include('users.modals.delete')
	@include('users.modals.restore')
@endsection

@section('blocks')
	@include('users.showTrashed.controls')
@endsection

@section ('scripts')
	@include('scripts.modals.delete')
	@include('scripts.modals.restore')
@endsection