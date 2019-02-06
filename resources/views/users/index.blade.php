@extends('layouts.app')

@section('title','Users')

@section('stylesheets')
@endsection

@section('sectionSidebar')
	 @include('users.sidebar')
@endsection

@section('breadcrumb')
	 <li><a href="/">Home</a></li>
	 <li class="active"><span>Users</span></li>
@endsection

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}
		<div class="panel panel-primary">
			@include('users.index.panelHeader')
			@include('users.index.alphabet')
			@include('users.index.help')
			<div class="panel-body">
				@if($users)
					@include('users.index.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
		</div>
@endsection

@section('blocks')
		@auth
			@include('users.index.controls')
		@endauth
		{{-- @include('users.blocks.archives') --}}
	</form>
@endsection

@section('scripts')
	@include('users.common.btnScript')
@endsection
