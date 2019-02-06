@extends('backend.layouts.app')

@section ('title','Create Article')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('backend.articles.index') }}">Articles</a></li>
	<li class="active"><span>Create Article</span></li>
@stop

@section('content')
	{!! Form::open(['route'=>'backend.articles.store']) !!}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9">
				@include('backend.articles.create.form')
			</div>

			<div class="col-xs-12 col-sm-12 col-md-3">
				@include('backend.articles.create.controls')
			</div>
		</div>
	{!! Form::close() !!}
@stop

@section ('scripts')
@stop