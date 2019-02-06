@extends('backend.layouts.app')

@section ('title','Upload Image')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.woodProjects.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.woodProjects.index') }}">Projects</a></li>
	<li class="active"><span>Upload Image</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'backend.woodProjectImage.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
		<input type="hidden" value="{{ $project_id }}" name="project_id" size="50"/>
		@include('backend.woodProjectImage.create.main')
@endsection

@section('blocks')
		@include('backend.woodProjectImage.create.controls')
	{!! Form::close()!!}
@endsection