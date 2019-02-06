@include('common.controlCenterHeader')

	<a href="/" class="btn btn-default btn-block">
		<i class="fa fa-home" aria-hidden="true"></i> Home
	</a>

	<a href="{{ route('recipes.index') }}" class="btn btn-block btn-default">
		<i class="fa fa-address-card-o" aria-hidden="true"></i>
		All Recipes
	</a>

	@if(checkACL('user'))
		<a href="{{ route('recipes.myFavorites') }}" class="btn btn-block btn-primary">
			<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
			My Favorites
		</a>
	@endif
	
	@if(checkACL('author'))
		<a href="{{ route('recipes.myRecipes') }}" class="btn btn-block btn-default">
			<i class="fa fa-list" aria-hidden="true"></i>
			My Recipes
		</a>
	@endif

@include('common.controlCenterFooter')