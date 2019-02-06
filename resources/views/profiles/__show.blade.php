@extends('frontend.layouts.app')

@section ('title', '| Blog')

@section ('stylesheets')
	{{ Html::style('css/main.css') }}
@stop

{{-- @section('sectionSidebar')
	@include('articles.frontend.sidebar')
@stop --}}

@section('breadcrumb')
  <ol class="breadcrumb breadcrumb-arrow">
    <li><a href="/">Home</a></li>
    <li class="active"><span>User Profile</span></li>
  </ol>
@stop

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">{{ ucfirst($user->username) }}'s User Profile</div>
		</div>
		{{-- <div class="panel-body"> --}}
			<table class="table table-hover">
				<tr>
					<th>Username</th>
					<td>{{ $user->username }}</td>
				</tr>
				<tr>
					<th>First Name</th>
					<td>{{ $user->profile->first_name }}</td>
				</tr>
				<tr>
					<th>Last Name</th>
					<td>{{ $user->profile->last_name }}</td>
				</tr>

				@if($user->publicEmail)
					<tr>
						<th>Email Address</th>
						<td>{{ $user->email }}</td>
					</tr>
				@endif

				<tr>
					<th>Member Since</th>
					<td>
						@if($user->created_at)
							{{ $user->created_at->format('M d, Y') }}
						@else
							Unknown
						@endif
					</td>
				</tr>
			</table>
		{{-- </div> --}}
		<div class="panel-footer clearfix">
			<div class="pull-right">
				<a href="{{ URL::previous() }}" class="btn btn-xs btn-default">Back</a>
			</div>
		</div>
	</div>
@endsection