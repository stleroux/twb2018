@extends('backend.layouts.app')

@section ('title','| Categories')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.categories.sidebar')
@stop

@section('breadcrumb')
	<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
	<li class="active"><span>Categories</span></li>
@stop

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9">
		@if($categories)
			@include('backend.categories.index.datagrid', ['title'=>'Categories'])
		@else
			@include('common.noRecordsFound', ['name'=>'Categories', 'icon'=>'sitemap', 'color'=>'primary'])
		@endif
	</div>

	<div class="col-xs-12 col-sm-12 col-md-3">
		@include('backend.categories.create.form')
		@include('backend.categories.index.help')
	</div>
</div>

@stop
