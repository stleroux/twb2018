@extends('backend.layouts.app')

@section ('title','Create Project')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.woodProjects.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.woodProjects.index') }}">Woodshop Projects</a></li>
	<li class="active"><span>Create Project</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'backend.woodProjects.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Add Project</h3>
			</div>
			
			<div class="panel-body">
				@include('backend.woodProjects.create.main')
				@include('backend.woodProjects.create.woodInfo')
				@include('backend.woodProjects.create.dimensions')
				@include('backend.woodProjects.create.stainInfo')
				@include('backend.woodProjects.create.finishInfo')
				@include('backend.woodProjects.create.otherInfo')
			</div>
		
			<div class="panel-footer">
				Items marked with an <span class='required'></span> are required.
			</div>
		</div>
@endsection

@section('blocks')
		@include('backend.woodProjects.create.controls')
	{!! Form::close()!!}
@endsection