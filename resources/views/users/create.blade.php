@extends('layouts.app')

@section('title','Create User')

@section('stylesheets')
@stop

@section('sectionSidebar')
	@include('users.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('users.index') }}">Users</a></li>
	<li class="active"><span>Create New User</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}

		<div class="panel panel-primary">
			@include('users.create.panelHeader')
			{{-- @include('users.create.alphabet') --}}
			@include('users.create.help')
			<div class="panel-body">
				@include('users.create.datagrid')
			</div>
		</div>
@stop

@section('blocks')
		@auth
			@include('users.create.controls')
		@endauth
		{{-- @include('users.blocks.archives') --}}
	</form>
@endsection

@section('scripts')
	@include('users.common.btnScript')
@endsection