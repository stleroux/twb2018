<ul class="nav nav-tabs">
	<li class="active"><a href="#newItemsHelp" data-toggle="pill">Information</a></li>
	@if($newAlbums->count())
		<li><a href="#newAlbums" data-toggle="pill">Albums ({{ $newAlbums->count() }})</a></li>
	@endif
	@if($newArticles->count())
		<li><a href="#newArticles" data-toggle="pill">Articles ({{ $newArticles->count() }})</a></li>
	@endif
	@if($newCategories->count())
		<li><a href="#newCategories" data-toggle="pill">Categories ({{ $newCategories->count() }})</a></li>
	@endif
	@if($newComments->count())
		<li><a href="#newComments" data-toggle="pill">Comments ({{ $newComments->count() }})</a></li>
	@endif
	@if($newModules->count())
		<li><a href="#newModules" data-toggle="pill">Modules ({{ $newModules->count() }})</a></li>
	@endif
	@if($newPosts->count())
		<li><a href="#newPosts" data-toggle="pill">Posts ({{ $newPosts->count() }})</a></li>
	@endif
	@if($newRecipes->count())
		<li><a href="#newRecipes" data-toggle="pill">Recipes ({{ $newRecipes->count() }})</a></li>
	@endif
	@if($newRoles->count())
		<li><a href="#newRoles" data-toggle="pill">Roles ({{ $newRoles->count() }})</a></li>
	@endif
	@if($newUsers->count())
		<li><a href="#newUsers" data-toggle="pill">Users ({{ $newUsers->count() }})</a></li>
	@endif
	@if($newWoodProjects->count())
		<li><a href="#newWoodProjects" data-toggle="pill">Wood Projects ({{ $newWoodProjects->count() }})</a></li>
	@endif
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="newItemsHelp">
		<br />
		HELP - Provide detailed instructions here. Provide detailed instructions here
	</div>
	<div class="tab-pane" id="newAlbums">
		@include('dashboard.newItems.albums.content')
	</div>
	<div class="tab-pane" id="newArticles">
		@include('dashboard.newItems.articles.content')
	</div>
	<div class="tab-pane" id="newCategories">
		@include('dashboard.newItems.categories.content')
	</div>
	<div class="tab-pane" id="newComments">
		@include('dashboard.newItems.comments.content')
	</div>
	<div class="tab-pane" id="newModules">
		@include('dashboard.newItems.modules.content')
	</div>
	<div class="tab-pane" id="newPosts">
		@include('dashboard.newItems.posts.content')
	</div>
	<div class="tab-pane" id="newRecipes">
		@include('dashboard.newItems.recipes.content')
	</div>
	<div class="tab-pane" id="newRoles">
		@include('dashboard.newItems.roles.content')
	</div>
	<div class="tab-pane" id="newUsers">
		@include('dashboard.newItems.users.content')
	</div>
	<div class="tab-pane" id="newWoodProjects">
		@include('dashboard.newItems.woodProjects.content')
	</div>
</div>
