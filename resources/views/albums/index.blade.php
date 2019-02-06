@extends('layouts.app')

@section('title','Albums')

@section('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
	@include('albums.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Albums</span></li>
@stop

@section('content')
	<div class="panel panel-primary">
		@include('albums.index.panelHeader')
		@include('albums.index.help')
		<div class="panel-body" style="padding-bottom:0px">
			@if($albums->count())
				@include('albums.index.datagrid')
			@else
				@include('common.noRecordsFound')
			@endif
		</div>
		@auth
			<div class="panel-footer">
				Click an album to view it's photos
			</div>
		@endauth
	</div>

	@if($albums->count())
		<div class="row">
			@include('common.view_more', ['message'=>'If you would like to see the pictures within the Albums'])
		</div>
	@endif

	<div class="row">
		{{ $albums->links('vendor.pagination.custom') }}
	</div>
	<br />
	
	{{-- @include('albums.modals.delete') --}}
@endsection

@auth
	@section('blocks')
			@include('albums.index.controls')
	@endsection
@endauth