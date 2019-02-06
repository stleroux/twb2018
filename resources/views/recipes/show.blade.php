@extends ('layouts.app')

@section ('title', 'View Recipe')

@section ('stylesheets')
	{{ Html::style('css/recipes.css') }}
@stop

@section('sectionSidebar')
	@include('recipes.sidebar')
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li><a href="{{ route('recipes.index','all') }}">Recipes</a></li>
	<li class="active">View Recipe</li>
@stop

@section ('content')

 {{-- {{ Session::get('backURL') }}
 {{ Session::get('archiveURL') }} --}}

	@include('recipes.show.header')
	
	<div class="row">
		@include('recipes.show.ingredients')
		@include('recipes.show.image')
	</div>
	
	<div class="row">
		@include('recipes.show.methodology')
	</div>

	<div class="row">
		@include('recipes.show.category')
		@include('recipes.show.servings')
		@include('recipes.show.prep_time')
		@include('recipes.show.cook_time')
		@include('recipes.show.personal')
		@include('recipes.show.views')
		@include('recipes.show.source')
	</div>

	<div class="row">
		@include('recipes.show.author_notes')
	</div>

	<div class="row">
		@include('common.view_more', ['message'=>'If you would like to see the full recipe'])
	</div>

	<div class="row">
		@include('recipes.show.comments')
	</div>

	@include('modals.image', ['title'=>'Recipe Image', 'img_path'=>'_recipes', 'img_name'=>'image', 'model'=>$recipe])
   @include('modals.print', ['title'=>'Print','name'=>'recipes','model'=>$recipe])
@stop

@section('blocks')
	@include('recipes.show.controls')
	{{-- @include('recipes.show.information') --}}
	@include('common.information', ['model'=>$recipe, 'title'=>'Recipe'])
	@include('recipes.blocks.archives')
	@include('recipes.show.leave_comment')
@stop

@section ('scripts')
@stop