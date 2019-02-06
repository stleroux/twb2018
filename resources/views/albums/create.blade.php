@extends('layouts.app')

@section ('title','Create Album')

@section ('stylesheets')
@stop

@section('sectionSidebar')
  @include('albums.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('albums.index') }}">Albums</a></li>
	<li class="active"><span>Create Album</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'albums.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
      {!! csrf_field() !!}
   	@include('albums.create.datagrid')

@endsection

@section('blocks')
   	@include('albums.create.controls')
	{!! Form::close()!!}
@stop