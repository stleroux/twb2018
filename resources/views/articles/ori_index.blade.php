@extends('layouts.app')

@section('title','Articles')

@section('stylesheets')
	{{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
	@include('articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Articles</span></li>
@stop

@section('content')

	@if(count($articles) > 0)
		@include('articles.index.main')
	@else
		@include('common.noRecordsFound', ['name'=>'Articles', 'icon'=>'file-text-o', 'color'=>'primary'])
	@endif
	
@stop

@section('blocks')
	@include('articles.index.controls')
	@include('articles.blocks.archives')
@stop

@section('scripts')
@stop