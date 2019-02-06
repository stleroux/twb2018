@extends('layouts.app')

@section('title','New Articles')

@section('stylesheets')
	{{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
	@include('articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('articles.index') }}">Articles</a></li>
	<li class="active"><span>New Articles</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}
		
		<div class="panel panel-primary">
			@include('articles.newArticles.panelHeader')
			@include('articles.newArticles.alphabet')
			@include('articles.newArticles.help')
			<div class="panel-body">
				@if($articles->count())
					@include('articles.newArticles.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
		</div>
@stop

@section('blocks')
		@include('articles.newArticles.controls')
	</form>
@endsection

@section('scripts')
	@include('articles.newArticles.scripts')
@stop