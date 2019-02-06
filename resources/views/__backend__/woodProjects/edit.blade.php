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
	<li class="active"><span>Edit Project</span></li>
@stop

@section('content')
{!! Form::model($project, ['route'=>['backend.woodProjects.update', $project->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">{{ $project->name }} - Edit Project Details</h3>
		</div>
			
		<div class="panel-body">
			@include('backend.woodProjects.edit.main')
			@include('backend.woodProjects.edit.woodInfo')
			@include('backend.woodProjects.edit.dimensions')
			@include('backend.woodProjects.edit.stainInfo')
			@include('backend.woodProjects.edit.finishInfo')
			@include('backend.woodProjects.edit.otherInfo')
		</div>
			
		<div class="panel-footer">
			Items marked with an <span class='required'></span> are required.
		</div>

	</div>

	{!! Form::close()!!}
@endsection

@section('blocks')
	@include('backend.woodProjects.edit.controls')
@endsection