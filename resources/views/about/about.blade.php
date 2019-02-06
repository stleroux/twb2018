@extends('layouts.app')

@section('title','About Us')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
	{{-- @include('backend.projects.sidebar') --}}
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>About Us</span></li>
@stop

@section('content')

	@include('errors.construction')

	<div class="row">
		<div class="col-md-12">
			@include('about.us')
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			@include('about.stephane')
		</div>

		<div class="col-md-6">
			@include('about.stacie')
		</div>
	</div>
	
@endsection