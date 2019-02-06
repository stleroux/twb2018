@extends('layouts.app')

@section ('title','| New Categories')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('categories.sidebar')
@stop

@section('breadcrumb')
	<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
	<li class="active"><span>New Categories</span></li>
@stop

@section('content')
		
<div class="row">
	<div class="col-xs-12">
		@if($categories)
			@include('categories.index.datagrid', ['title'=>'New Categories'])
		@else
			@include('common.noRecordsFound', ['name'=>'Categories', 'icon'=>'sitemap', 'color'=>'primary'])
		@endif
	</div>
</div>

@stop
