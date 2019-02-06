@extends('backend.layouts.app')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
@stop

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Welcome back {{ Auth::user()->profile->first_name }}!</div>
			</div>
			<div class="panel-body">
				<p>You have logged in {{ Auth::user()->login_count }} times to date.</p>
			</div>
		</div>
	</div>


@if(checkACL('editor'))
	<div class="col-xs-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">
					New items since last login
				</div>
			</div>
			<div class="panel-body">
				<ul class="list-inline">
					@include('backend.dashboard.newItems.albums.label')
					@include('backend.dashboard.newItems.articles.label')
					@include('backend.dashboard.newItems.categories.label')
					@include('backend.dashboard.newItems.comments.label')
					@include('backend.dashboard.newItems.modules.label')
					@include('backend.dashboard.newItems.posts.label')
					@include('backend.dashboard.newItems.recipes.label')
					@include('backend.dashboard.newItems.roles.label')
					@include('backend.dashboard.newItems.users.label')
					@include('backend.dashboard.newItems.woodProjects.label')
				</ul>
			</div>
		</div>
	</div>
@endif
</div>


@if(checkACL('editor'))





{{-- 	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<a data-toggle="collapse" href="#new" style="display: block; text-decoration: none;">
							<i class="fa fa-bar-chart" aria-hidden="true"></i>
							New items since last login
							<span class="badge pull-right">
								<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
								<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
							</span>
						</a>
					</div>
				</div>

				<div id="new" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
								@include('backend.dashboard.newItems.albums.content')
								@include('backend.dashboard.newItems.articles.content')
								@include('backend.dashboard.newItems.categories.content')
								@include('backend.dashboard.newItems.comments.content')
								@include('backend.dashboard.newItems.modules.content')
								@include('backend.dashboard.newItems.posts.content')
								@include('backend.dashboard.newItems.recipes.content')
								@include('backend.dashboard.newItems.roles.content')
								@include('backend.dashboard.newItems.users.content')
								@include('backend.dashboard.newItems.woodProjects.content')
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div> --}}
@endif




@if(checkACL('author'))
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<a data-toggle="collapse" href="#stats" style="display: block; text-decoration: none;">
							<i class="fa fa-bar-chart" aria-hidden="true"></i>
							Statistics
							<span class="badge pull-right">
                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                     </span>
						</a>
					</div>
				</div>
				<div id="stats" class="panel-collapse collapse">
					<div class="panel-body">
						<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th></th>
								<th>Published</th>
								<th>Unpublished</th>
								<th>Future</th>
								<th>Trashed</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>Articles</th>
								<td>{{ App\Article::published()->count() }}</td>
								<td>{{ App\Article::unpublished()->count() }}</td>
								<td>{{ App\Article::future()->count() }}</td>
								<td>{{ App\Article::trashedCount()->count() }}</td>
							</tr>
							<tr>
								<th>Projects</th>
								<td>{{ App\WoodProject::count() }}</td>
								<td>--</td>
								<td>--</td>
								<td>--</td>
							</tr>
							<tr>
								<th>Recipes</th>
								<td>{{ App\Recipe::published()->count() }}</td>
								<td>{{ App\Recipe::unpublished()->count() }}</td>
								<td>{{ App\Recipe::future()->count() }}</td>
								<td>{{ App\Recipe::trashedCount()->count() }}</td>
							</tr>
							<tr>
								<th>Products</th>
								<td>N/A</td>
								<td>N/A</td>
								<td>N/A</td>
								<td>N/A</td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif


<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<a data-toggle="collapse" href="#userRoles" style="display: block; text-decoration: none;">
						<i class="fa fa-users" aria-hidden="true"></i>
						Users by Roles
						<span class="badge pull-right">
							<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
							<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
						</span>
					</a>
				</div>
			</div>

			<div id="userRoles" class="panel-collapse collapse">
				<div class="panel-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						@foreach($roles as $role)
							<li role="presentation">
								<a href="#{{ $role->name }}" aria-controls="{{ $role->name }}" role="tab" data-toggle="tab">
									{{ ucfirst($role->name) }}
									{{-- <div class="badge"> --}}[{{ App\User::where('role_id', '=', $role->id)->count() }}] {{-- </div> --}}
								</a>
							</li>
						@endforeach
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						@foreach($roles as $role=>$data)
							@php
								$rid = App\User::where('role_id', '=', $data->id)->get();
							// $rid = App\User::where('role_id', '=', 60)->get();
								//dd($rid);
							@endphp

							{{-- <div role="tabpanel" class="tab-pane{{ (Auth::user()->role->name == $data->name) ? ' active' : '' }}" id="{{ $data->name }}"> --}}
							<div role="tabpanel" class="tab-pane" id="{{ $data->name }}">
								@if($rid->count() > 0)
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th>Username</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Email Address</th>
											<th>Logins</th>
											<th>Member Since</th>
										</tr>
									</thead>
									<tbody>
									@foreach($rid as $data)
										<tr>
											<td>{{ $data->username }}</td>
											<td>{{ $data->profile->first_name }}</td>
											<td>{{ $data->profile->last_name }}</td>
											<td>{{ $data->email }}</td>
											<td>{{ $data->login_count }}</td>
											<td>{{ $data->created_at or 'N/A' }}</td>
										</tr>
									@endforeach
									</tbody>
								</table>
								@else
									No accounts defined yet.
								@endif
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
