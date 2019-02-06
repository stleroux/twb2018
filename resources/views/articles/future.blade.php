@extends('layouts.app')

@section('title','Articles')

@section('stylesheets')
	{{ Html::style('css/articles.css') }}
@stop

@section('sectionSidebar')
	@include('articles.sidebar')
@stop

@section('breadcrumb')
	<li><a href="dashboard">Dashboard</a></li>
	<li><a href="{{ route('articles.index') }}">Articles</a></li>
	<li class="active"><span>Future Articles</span></li>
@stop

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}

		<div class="panel panel-primary">
			@include('articles.future.panelHeader')
			@include('articles.future.alphabet')
			@include('articles.future.help')
			<div class="panel-body">
				@if($articles->count())
					@include('articles.future.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
		</div>
@stop

@section('blocks')
		@include('articles.future.controls')
		@include('articles.future.help')
	</form>
@endsection

@section('scripts')
	@include('articles.common.btnScript')
@stop