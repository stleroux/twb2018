{{-- Page to display Recipes in frontend --}}

@extends('layouts.app')

@section('title', '| Recipes')

@section('stylesheets')
	{{ Html::style('css/recipes.css') }}
@stop

@section('sectionSidebar')
	@include('recipes.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Recipes</span></li>
@stop

@section('menubar')
	@include('recipes.menubar')
@endsection

@section('content')
	<form style="display:inline;">
		{!! csrf_field() !!}
		
		<div class="panel panel-primary">
			@include('recipes.index.panelHeader')
			@include('recipes.index.alphabet')
			@include('recipes.index.help')
			<div class="panel-body">
				@if($recipes->count())
					@include('recipes.index.datagrid')
				@else
					@include('common.noRecordsFound')
				@endif
			</div>
		</div>
@stop

@section('blocks')
	@auth
		@include('recipes.index.controls')
	@endauth
	@include('recipes.blocks.archives')
@stop

@section('scripts')
	@include('recipes.common.btnScript')
@stop
