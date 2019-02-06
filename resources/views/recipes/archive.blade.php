{{-- Used to display recipe list when user clicks on links in the recipe archives block on the main page --}}

@extends ('layouts.app')

@section ('title', '| Recipes Archive')

@section ('stylesheets')
	{{ Html::style('css/frontend.css') }}
@stop

@section('sectionSidebar')
	{{-- @include('recipes.sidebar') --}}
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="#">Recipes</a></li>
	<li class="active">Archives</li>
@stop

@section ('content')
	@include('recipes.archive.main')
@stop

@section('blocks')
	@include('recipes.archive.controls')
   @include('recipes.blocks.archives')
@stop

@section ('scripts')
@stop
