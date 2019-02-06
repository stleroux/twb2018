@extends('layouts.app')

@section ('title','Upload Image')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('woodProjects.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('woodProjects.index') }}">Projects</a></li>
	<li class="active"><span>Upload Image</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'woodProjectImages.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
		<input type="hidden" value="{{ $project_id }}" name="project_id" size="50"/>
		@include('woodProjectImages.create.main')
@endsection

@section('blocks')
		@include('woodProjectImages.create.controls')
	{!! Form::close()!!}
@endsection