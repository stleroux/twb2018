@include('common.controlCenterHeader')

<!-- Only show this button if coming from the Published page -->
@if (false !== stripos($_SERVER['HTTP_REFERER'], "/recipes/published"))
	<a href="{{ URL::previous() }}" class="btn btn-default btn-sm btn-block">
		<i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Published
	</a>
@endif

<!-- Only show this button if coming from the myRecipes page -->
@if (false !== stripos($_SERVER['HTTP_REFERER'], "/recipes/myRecipes"))
	<a href="{{ URL::previous() }}" class="btn btn-default btn-sm btn-block">
		<i class="fa fa-arrow-left" aria-hidden="true"></i> Back to My Recipes
	</a>
@endif

<!-- Only show this button if coming from the myFavorites page -->
@if (false !== stripos($_SERVER['HTTP_REFERER'], "/recipes/myFavorites"))
	<a href="{{ URL::previous() }}" class="btn btn-default btn-sm btn-block">
		<i class="fa fa-arrow-left" aria-hidden="true"></i> Back to My Favorites
	</a>
@endif

<!-- Only show this button if coming from the Unpublished page -->
@if (false !== stripos($_SERVER['HTTP_REFERER'], "/recipes/unpublished"))
	<a href="{{ URL::previous() }}" class="btn btn-default btn-sm btn-block">
		<i class="fa fa-arrow-left" aria-hidden="true"></i> Back to UnPublished
	</a>
@endif

<!-- Only show the Back to Archives List button if coming from the archive page -->
@if ($url = Session::get('backUrl'))
	<a href="{{ $url }}" class="btn btn-default btn-sm btn-block">
		<i class="fa fa-arrow-left" aria-hidden="true"></i>
		Back to Archives List
	</a>
@endif

@if (Auth::check())
	@if(checkACL('author'))
		@if(($recipe->published_at <= Carbon\Carbon::Now()) && ($recipe->published_at != NULL))
			@if(count($recipe->favorites))
				<a href="{{ route('backend.recipes.removeFavorite', $recipe->id) }}" class="btn btn-default btn-sm btn-block">
					<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Remove Favorite
				</a>
			@else
				<a href="{{ route('backend.recipes.addFavorite', $recipe->id) }}" class="btn btn-default btn-sm btn-block">
					<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Add To My Favorites
				</a>
			@endif
		@endif                     
	@endif

	@if(checkACL('author'))
		<a href="" type="button" class="btn btn-default btn-sm btn-block" data-toggle="modal" data-target="#printModal">
			<i class="fa fa-print" aria-hidden="true"></i> Print Recipe
		</a>
	@endif
		
	@if(checkACL('editor', $recipe))
		<a href="{{ route('backend.recipes.edit', $recipe->id) }}" class="btn btn-info btn-sm btn-block">
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Recipe
		</a>
	@endif

	@if(checkACL('manager', $recipe))
		<a href="{{ route('backend.recipes.destroy', $recipe->id) }}" class="btn btn-danger btn-sm btn-block">
			<i class="fa fa-trash-o" aria-hidden="true"></i> Delete Recipe
		</a>
	@endif

	@if((checkACL('admin', $recipe)) || checkOwner($recipe))
		@if(!$recipe->personal)
			<a href="{{-- {{ route('recipes.makeprivate', $recipe->id) }} --}}" class="btn btn-default btn-sm btn-block">
				<i class="fa fa-eye-slash" aria-hidden="true"></i> Make Private
			</a>
		@else
			<a href="{{-- {{ route('recipes.removeprivate', $recipe->id) }} --}}" class="btn btn-default btn-sm btn-block">
				<i class="fa fa-eye" aria-hidden="true"></i> Remove Private
			</a>
		@endif
	@endif
@endif


@include('common.controlCenterFooter')