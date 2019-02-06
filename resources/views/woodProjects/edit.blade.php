@extends('layouts.app')

@section ('title','Create Project')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('woodProjects.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('woodProjects.index') }}">Woodshop Projects</a></li>
	<li class="active"><span>Edit Project</span></li>
@stop

@section('content')
	{!! Form::model($project, ['route'=>['woodProjects.update', $project->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $project->name }} - Edit Project Details</h3>
			</div>
				
			<div class="panel-body">
				@include('woodProjects.edit.main')
				@include('woodProjects.edit.woodInfo')
				@include('woodProjects.edit.dimensions')
				@include('woodProjects.edit.stainInfo')
				@include('woodProjects.edit.finishInfo')
				@include('woodProjects.edit.otherInfo')
			</div>
				
			<div class="panel-footer">
				Items marked with an <span class='required'></span> are required.
			</div>
		</div>
	
@endsection

@section('blocks')
		@include('woodProjects.edit.controls')
	{!! Form::close()!!}
@endsection