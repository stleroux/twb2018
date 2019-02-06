@extends('backend.layouts.app')

@section ('title','Create Album')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('backend.albums.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.albums.index') }}">Albums</a></li>
	<li class="active"><span>Create Album</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'backend.albums.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
	@include('backend.albums.create.main')
@endsection

@section('blocks')
	@include('backend.albums.create.controls')
	{!! Form::close()!!}
@stop