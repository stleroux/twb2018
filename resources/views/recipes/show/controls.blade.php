@include('common.controlCenterHeader')

{{-- 	@if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'homepage')
		<a href="{{ route('homepage') }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> Home
		</a>
	@endif

	<!-- Only show this button if coming from the myRecipes page -->
	@if (false !== stripos($_SERVER['HTTP_REFERER'], "/recipes/myRecipes"))
		<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> My Recipes
		</a>
	@endif

	Only show this button if coming from the myFavorites page
	@if (false !== stripos($_SERVER['HTTP_REFERER'], "/recipes/myFavorites"))
		<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> My Favorites
		</a>
	@endif

	<!-- Only show this button if coming from the search results page -->
	@if (false !== stripos($_SERVER['HTTP_REFERER'], "/search/recipes"))
		<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> Search Results
		</a>
	@endif --}}

	<!-- Only show the Back to Archives List button if coming from the archive page -->

	<!-- Only show this button if coming from the recipes admin list page -->
	{{-- @if (false !== stripos($_SERVER['HTTP_REFERER'], "/admin/recipes"))
		<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
			<i class="fa fa-arrow-left" aria-hidden="true"></i>   Back
		</a>
	@endif --}}

{{-- 	@if(Session::get('fullURL'))
		<a href="{{ URL(Session::get('fullURL')) }}" class="btn btn-default btn-block">
			<i class="fa fa-undo" aria-hidden="true"></i> Back 111
		</a>
	@endif --}}
	

	
		@if(Session::get('backURL'))
			{{-- @php
				// $string =  Session::get('backURL')
				$string = str_contains(Session::get('backURL'), 'index');
				echo $string;
			@endphp --}}
			@if(!str_contains(Session::get('backURL'), 'index'))

			<a href="{{ route(Session::get('backURL')) }}" class="btn btn-default btn-block">
				<i class="fa fa-address-card-o" aria-hidden="true"></i>
				{{ ucfirst(substr(Session::get('backURL'), strpos(Session::get('backURL'), ".") + 1)) }}
			</a>
			@endif
		@endif
	

	<a href="{{ URL('recipes') }}" class="btn btn-default btn-block">
		<i class="fa fa-address-card-o" aria-hidden="true"></i> Recipe List
	</a>

	@auth
		@if(!$next)
			<a href="{{ URL::to( 'recipes/index' ) }}" class="btn btn-default btn-block disabled">
				<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				Next
			</a>
		@else
			<a href="{{ URL::to( 'recipes/' . $next ) }}" class="btn btn-default btn-block">
				<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				Next
			</a>
		@endif
		
		@if(!$previous)
			<a href="{{ URL::to( 'recipes/' . $previous ) }}" class="btn btn-default btn-block disabled">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
				Previous
			</a>
		@else
			<a href="{{ URL::to( 'recipes/' . $previous ) }}" class="btn btn-default btn-block">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
				Previous
			</a>
		@endif
	@endauth

	@if(checkACL('user'))
		@if(count($recipe->favorites))
			<a href="{{ route('recipes.removeFavorite', $recipe->id) }}" class="btn btn-default btn-block">
				<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Remove Favorite
			</a>
		@else
			<a href="{{ route('recipes.addFavorite', $recipe->id) }}" class="btn btn-default btn-block">
				<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Add To My Favorites
			</a>
		@endif
	@endif

	@if(checkACL('user'))
		<a href="" type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#printModal">
			<i class="fa fa-print" aria-hidden="true"></i> Print
		</a>
	@endif


	@if(checkACL('editor', $recipe))
		<a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-info btn-block">
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Recipe
		</a>
	@endif

	@if(checkACL('manager', $recipe))
		<a href="{{ route('recipes.destroy', $recipe->id) }}" class="btn btn-danger btn-block">
			<i class="glyphicon glyphicon-list"></i>
			Trash Recipe
		</a>
	@endif

	{{-- @if(checkACL('author', $recipe)) --}}
	@if((checkACL('admin', $recipe)) || checkOwner($recipe))
		@if(!$recipe->personal)
		<a href="{{ route('recipes.makePrivate', $recipe->id) }}" class="btn btn-default btn-block">
			<i class="fa fa-trash-o" aria-hidden="true"></i> Make Private
		</a>
		@else
		<a href="{{ route('recipes.removePrivate', $recipe->id) }}" class="btn btn-default btn-block">
			<i class="fa fa-trash-o" aria-hidden="true"></i> Remove Private
		</a>
		@endif
	@endif

	@if((checkACL('admin', $recipe)) || checkOwner($recipe))
		@if(!$recipe->published_at)
		<a href="{{ route('recipes.publish', $recipe->id) }}" class="btn btn-default btn-block">
			<i class="fa fa-trash-o" aria-hidden="true"></i> Publish
		</a>
		@else
		<a href="{{ route('recipes.unpublish', $recipe->id) }}" class="btn btn-default btn-block">
			<i class="fa fa-trash-o" aria-hidden="true"></i> Unpublish
		</a>
		@endif
	@endif

@include('common.controlCenterFooter')