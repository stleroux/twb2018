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
	<li class="active"><span>Unpublished Articles</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}

		<div class="panel panel-primary">
			@include('articles.unpublished.panelHeader')
			@include('articles.unpublished.alphabet')
			@include('articles.unpublished.help')
			<div class="panel-body">
				@if($articles->count())
					@include('articles.unpublished.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
		</div>
@stop

@section('blocks')
		@include('articles.unpublished.controls')
	</form>
@endsection

@section('scripts')
	@include('articles.common.btnScript')
@stop