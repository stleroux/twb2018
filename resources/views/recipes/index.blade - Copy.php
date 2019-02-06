{{-- Page to display Recipes in frontend --}}

@extends('frontend.layouts.app')

@section ('title', '| Recipes')

@section ('stylesheets')
	{{ Html::style('css/recipes.css') }}
@stop

@section('sectionSidebar')
	{{-- @include('recipes.sidebar') --}}
@stop

@section('breadcrumb')
	<li><a href="/">Home</a></li>
	<li class="active"><span>Recipes</span></li>
@stop

@section('content')

	@if(count($recipes) > 0)
		<div class="panel panel-primary">

			<div class="panel-heading">
				<h3 class="panel-title">
					@if(Request::is('recipes/myFavorites/*'))
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
						My Favorite Recipes
					@elseif(Request::is('recipes/myRecipes/*'))
						<i class="fa fa-list" aria-hidden="true"></i>
						My Recipes
					@else
						<i class="fa fa-address-card-o" aria-hidden="true"></i>
						Recipes
					@endif

					<div class="pull-right">
						@if(checkACL('user'))
							<a href="{{ route('recipes.myFavorites','all') }}"
							class="{{ Request::is('recipes/myFavorites/*') ? "btn-default": "btn-primary" }} btn btn-xs"
							title="My Favorites" >
								<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
								My Favorites
							</a>
						@endif
						
						@if(checkACL('author'))
							<a href="{{ route('recipes.myRecipes','all') }}"
							class="{{ Request::is('recipes/myRecipes/*') ? "btn-default": "btn-primary" }} btn btn-xs"
							title="My Recipes" >
								<i class="fa fa-list" aria-hidden="true"></i>
								My Recipes
							</a>
						@endif
						
						@if(checkACL('user'))
							<a href="{{ route('recipes.index','all') }}"
							class="{{ (Request::is('recipes/all') || Request::is('recipes')) ? "btn-default": "btn-primary" }} btn btn-xs"
							title="All Recipes" >
								<i class="fa fa-address-card-o" aria-hidden="true"></i>
								All Recipes
							</a>
						@endif
					</div>
				</h3>
			</div>

			<div class="well well-sm text text-center" style="margin-bottom: 0px">
				<a href="{{ route('recipes.index') }}" class="{{ Request::is('recipes') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
				@foreach($letters as $value)
					 <a href="{{ route('recipes.index', $value) }}" class="{{ Request::is('recipes/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
				@endforeach
			</div>

			<div class="panel-body" style="margin-bottom: 0px; padding-bottom: 0px">
				<table id="datatable" class="table table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Category</th>
							<th>Views</th>
							<th>Author</th>
							<th>Created On</th>
							<th>Published On</th>
						</tr>
					</thead>
					<tbody>
						@foreach($recipes as $recipe)
						<tr>
							<td>
								@if($recipe->image)
									<img src="\_recipes\{{ $recipe->image }}" height="30" width="32">
								@else
									<i class="fa fa-2x fa-picture-o" aria-hidden="true"></i>
								@endif
								&nbsp;
								<a href="{{ route('recipes.show', $recipe->id) }}">{{ ucwords($recipe->title) }}</a>
							</td>
							<td>{{ $recipe->category->name }}</td>
							<td>{{ $recipe->views }}</td>
							<td>@include('common.authorFormat', ['model'=>$recipe])</td>
							<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'created_at'])</td>
							<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'published_at'])</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@else
		@include('common.noRecordsFound', ['name'=>'Recipes', 'icon'=>'address-card-o', 'color'=>'primary'])
	@endif

@endsection
