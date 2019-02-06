@extends('layouts.app')

@section ('title','| Categories')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('categories.sidebar')
@stop

@section('breadcrumb')
	<li><a href="{{ route('homepage') }}">Home</a></li>
	<li class="active"><span>Categories</span></li>
@stop

@section('content')
	<div class="panel panel-primary">
		@include('categories.index.panelHeader')
		<div class="panel-body">
			@if($categories->count())
				@include('categories.index.datagrid')
			@else
				@include('common.noRecordsFound')
			@endif
		</div>
	</div>
	@include('categories.modals.delete')
@stop

@section('blocks')
	@include('categories.create.form')
	@include('categories.index.help')
@endsection