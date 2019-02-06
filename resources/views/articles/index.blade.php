{{-- Page to display Articles in frontend --}}

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
	<form style="display:inline;">
		{!! csrf_field() !!}
		
		<div class="panel panel-primary">
			@include('articles.index.panelHeader')
			@include('articles.index.alphabet')
			@include('articles.index.help')
			<div class="panel-body">
				@if($articles->count())
					@include('articles.index.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
		</div>
@stop

@section('blocks')
		@auth
			@include('articles.index.controls')
		@endauth
		@include('articles.blocks.archives')
	</form>
@endsection

@section('scripts')
	@include('articles.common.btnScript')
@stop