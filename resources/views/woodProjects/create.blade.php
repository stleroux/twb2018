@extends('layouts.app')

@section ('title','Create Wood Project')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('woodProjects.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('woodProjects.index') }}">Wood Projects</a></li>
	<li class="active"><span>Create Wood Project</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'woodProjects.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
      {!! csrf_field() !!}
   	@include('woodProjects.create.datagrid')
		@include('woodProjects.create.woodInfo')
		@include('woodProjects.create.dimensions')
		@include('woodProjects.create.stainInfo')
		@include('woodProjects.create.finishInfo')
		@include('woodProjects.create.otherInfo')
@endsection

@section('blocks')
   	@include('woodProjects.create.controls')
	{!! Form::close()!!}
@stop
