<!--
	Used to display user profile in read only mode
	Accessed when clicking a username link in the recipes list section
-->

@extends('layouts.main')

@section ('title', '| Show User')

@section ('stylesheets')
	{{ Html::style('css/admin.css') }}
@stop

@section('content')
	<ol class="breadcrumb">
		<li><a href="/">Home</a></li>
		@if (Auth::user())
			{{-- @if (Auth::user()->hasAnyRole(['author', 'editor', 'admin'])) --}}
				<li><a href="{{ route('users.index') }}">Users</a></li>
			{{-- @else
				<li>Users</li>
			@endif --}}
		@endif
		<li class="active">{{ $user->first_name }} {{ $user->last_name }}</li>
	</ol>

	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading"><b>User Profile</b> :: {{ $user->first_name }} {{ $user->last_name }}</div>
				<div class="panel-body">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">Personal Info</div>
							<div class="panel-body">
								<table>
									<tr>
										<th width='120px'>First Name</th>
										<td>{{ $user->first_name }}</td>
									</tr>
									<tr>
										<th>Last Name</th>
										<td>{{ $user->last_name }}</td>
									</tr>

									@if ($user->show_email)
										<tr>
											<th>Email Address</th>
											<td>{{ $user->email }}</td>
										</tr>
									@endif

								</table>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						
					</div>
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-heading">Image</div>
							<div class="panel-body text-center">
								 @if ($user->image)
									{{ Html::image("images/profiles/" . $user->image, "",array('height'=>'115','width'=>'115')) }}
								@else
									<i class="fa fa-5x fa-user" aria-hidden="true"></i>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Sidebar -->
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">Options</div>
				<div class="panel-body">
					<a class="btn btn-default btn-block" href="{{ URL::previous() }}">
						<div class='text text-left'>
							<i class="fa fa-arrow-left" aria-hidden="true"></i> Back
						</div>
					</a>
				</div>
			</div>
		</div>
	</div> <!-- End row -->




	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">Account Information</div>
				<div class="panel-body">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">Date(s)</div>
							<div class="panel-body">
								<table>
									<tr>
										<th width='120px'>Created on</th>
										<td align='right'>{{ date('M j, Y', strtotime($user->created_at)) }}</td>
									</tr>
									<tr>
										<th>Updated on</th>
										<td align='right'>{{ date('M j, Y', strtotime($user->updated_at)) }}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">Account Type(s)</div>
							<div class="panel-body">
								@foreach ($user->roles as $role)
									<div> {{ $role->name }} </div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

