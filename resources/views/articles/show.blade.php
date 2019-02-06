@extends('layouts.app')

@section ('title','View Article')

@section ('stylesheets')
	{{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
	@include('articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('articles.index') }}">Articles</a></li>
	<li class="active"><span>View Article</span></li>
@stop

@section('content')
	
	<div class="panel panel-primary">
		@include('articles.show.panelHeading')
		@include('articles.show.help')
	</div>

	<div class="row">
		@include('articles.show.title')
		@include('articles.show.category')
	</div>

	@include('articles.show.description_eng')
	@include('articles.show.description_fre')
	
	<div class="row">
		@include('common.view_more', ['message'=>'If you would like to see the full article'])
	</div>
	
	@include('articles.show.comments')
	@include('modals.print', ['title'=>'Print','name'=>'articles','model'=>$article])
	@include('articles.modals.trash')
@stop

@section('blocks')
	@include('articles.show.controls')
	@include('common.information', ['model'=>$article, 'title'=>'Article'])
	@include('articles.blocks.archives')
	@include('articles.show.leaveComment')
@stop

@section ('scripts')
	@include('scripts.modals.trash')
@stop