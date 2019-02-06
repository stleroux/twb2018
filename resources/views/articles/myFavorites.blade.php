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
	<li><a href="{{ route('articles.index') }}">Articles</a></li>
	<li class="active"><span>My Favorite Articles</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}

		<div class="panel panel-primary">
			@include('articles.myFavorites.panelHeader')
			@include('articles.myFavorites.alphabet')
			@include('articles.myFavorites.help')
			<div class="panel-body">
				@if($articles)
					@include('articles.myFavorites.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
		</div>
@stop

@section('blocks')
		@include('articles.myFavorites.controls')
	</form>
@endsection

@section('scripts')
	@include('articles.common.btnScript')
@stop