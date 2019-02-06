@extends('backend.layouts.app')

@section ('title','Upload Photo')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.albums.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.albums.index') }}">Albums</a></li>
	<li class="active"><span>Upload Photo</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'backend.photos.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
		<input type="hidden" value="{{ $album_id }}" name="album_id" size="50"/>
		@include('backend.photos.create.main')

@stop

@section('blocks')
		@include('backend.photos.create.controls')
	{!! Form::close()!!}
@stop


