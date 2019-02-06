@extends ('backend.layouts.app')

@section ('title', 'View Recipe')

@section ('stylesheets')
@stop

@section('sectionSidebar')
	@include('backend.recipes.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('recipes.index','all') }}">Recipes</a></li>
	<li><span class="active">View Recipe</span></li>
@stop

@section ('content')
	@include('backend.recipes.show.main')
	@include('modals.print', ['title'=>'Print', 'name'=>'recipes', 'model'=>$recipe])
	@include('modals.image', ['title'=>'Recipe Image', 'img_path'=>'_recipes', 'img_name'=>'image', 'model'=>$recipe])
@stop

@section('blocks')
	@include('backend.recipes.show.controls')
	@include('common.information', ['model'=>$recipe, 'title'=>'Recipe'])
@stop

@section ('scripts')
@stop