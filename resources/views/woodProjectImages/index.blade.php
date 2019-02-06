@extends('layouts.app')

@section('title','Woodshop Project Images')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
	@auth
		@include('woodProjects.sidebar')
	@endauth
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('woodProjects.index') }}">Woodshop Projecs</a></li>
	<li><a href="{{ $project->name }}">{{ $project->name }}</a></li>
	<li class="active"><span>Manage Images</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}
		
		<div class="panel panel-primary">
			@include('woodProjectImages.index.panelHeader')
			@include('woodProjectImages.index.help')
			<div class="panel-body">
				@if($images->count())
					@include('woodProjectImages.index.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
		</div>
@endsection

@section('blocks')
		@include('woodProjectImages.index.controls')
	{{ Form::close() }}
@endsection