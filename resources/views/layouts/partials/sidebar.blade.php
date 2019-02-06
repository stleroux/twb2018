

{{-- SIDEBAR --}}

<div class="panel-group" id="accordion">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				Main Menu
			</h4>
		</div>

		<div class="list-group">
			
			<a href="{{ route('homepage') }}" class="list-group-item {{ Nav::isRoute('homepage') }}">
				<i class="fa fa-home" aria-hidden="true"></i>
				Home
			</a>

		@if(checkACL('manager'))
			<a href="{{ route('dashboard') }}" class="list-group-item {{ Nav::isRoute('dashboard') }}">
				<i class="fa fa-cogs" aria-hidden="true"></i>
				Dashboard
			</a>
		@endif

			<a href="{{ route('articles.index') }}"
				class="list-group-item
						{{ Nav::hasSegment('articles', 1) }}
						{{ Nav::hasSegment('newArticles', 1) }}
			">
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
				Articles
			</a>

			<a href="{{ route('blog.index') }}" class="list-group-item {{ Nav::hasSegment('blog', 1) }}">
				<i class="fa fa-newspaper-o" aria-hidden="true"></i>
				Blog
			</a>

			@if(checkACL('manager'))
				<a href="{{ route('categories.index') }}" class="list-group-item {{ Nav::hasSegment('categories', 1) }}">
					<i class="fa fa-sitemap" aria-hidden="true"></i>
					Categories
				</a>
			@endif

{{--          <a href="{{ route('comments.index') }}" class="list-group-item {{ Nav::hasSegment('comments', 2) }}">
				<i class="fa fa-comments-o" aria-hidden="true"></i>
				Comments
			</a> --}}

{{--          <a href="{{ route('gallery.list') }}" class="list-group-item {{ Nav::hasSegment('gallery', 2) }} {{ Nav::hasSegment('gallery', 2) }}">
				<i class="fa fa-leanpub" aria-hidden="true"></i>
				Galleries
			</a> --}}

			<a href="{{ route('items.index') }}" class="list-group-item {{ Nav::hasSegment('items', 1) }}">
				<i class="fa fa-list" aria-hidden="true"></i>
				Items
			</a>

{{--          <a href="{{ route('landingPages.index') }}" class="list-group-item {{ Nav::hasSegment('landingPages', 2) }}">
				<i class="fa fa-file-text" aria-hidden="true"></i>
				Landing Pages
			</a> --}}

{{--          <a href="{{ route('modules.index') }}" class="list-group-item {{ Nav::hasSegment('modules', 2) }}">
				<i class="fa fa-cubes" aria-hidden="true"></i>
				Modules
			</a> --}}

			<a href="{{ route('albums.index') }}" class="list-group-item {{ Nav::hasSegment('albums', 1) }}{{--  {{ Nav::hasSegment('album', 2) }} --}}">
				<i class="fa fa-camera-retro" aria-hidden="true"></i>
				Photo Albums
			</a>

{{--          <a href="{{ route('posts.index') }}" class="list-group-item {{ Nav::hasSegment('posts', 2) }}">
				<i class="fa fa-newspaper-o" aria-hidden="true"></i>
				Posts
			</a> --}}

			<a href="{{ route('recipes.index') }}" class="list-group-item {{ Nav::hasSegment('recipes', 1) }} {{ Nav::hasSegment('recipe', 1) }}">
				<i class="fa fa-address-card-o" aria-hidden="true"></i>
				Recipes
			</a>

{{--          <a href="{{ route('roles.index') }}" class="list-group-item {{ Nav::hasSegment('roles', 2) }}">
				<i class="fa fa-circle" aria-hidden="true"></i>
				Roles
			</a> --}}

			@if(checkACL('admin'))
				<a href="{{ route('users.index') }}" class="list-group-item {{ Nav::hasSegment('users', 1) }}">
					<i class="fa fa-users" aria-hidden="true"></i>
					Users
				</a>
			@endif
			
         <a href="{{ route('woodProjects.index') }}" class="list-group-item {{ Nav::hasSegment('woodProjects', 1) }}">
				<i class="fa fa-pagelines" aria-hidden="true"></i>
				Woodshop Projects
			</a>

		</div>

	</div>

		<br />
		@yield('sectionSidebar')


		{{-- <br /> --}}
		{{-- Only show this menu if you are on the Dashboard page --}}
		{{-- @if(Route::currentRouteName() == 'dashboard') --}}
			{{-- <div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseReports" style="display: block; text-decoration: none;">
							<i class="fa fa-file-text" aria-hidden="true"></i>
							Reports
							<span class="badge pull-right">
								<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
								<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
							</span>
						</a>
					</h4>
				</div>

				<div id="collapseReports" class="panel-collapse collapse">
					<table class="table table-hover">
						<tr>
							<td>
								<a href="#" style="display: block; text-decoration: none;">
									<i class="fa fa-usd" aria-hidden="true"></i>
									Sales
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="#" style="display: block; text-decoration: none;">
									<i class="fa fa-users" aria-hidden="true"></i>
									Customers
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="#" style="display: block; text-decoration: none;">
									<i class="fa fa-tasks" aria-hidden="true"></i>
									Products
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="#" style="display: block; text-decoration: none;">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									Shopping Cart
								</a>
							</td>
						</tr>
					</table>
				</div> <!--End of CollapseReports -->
			</div> --}}
		{{-- @endif --}}

	</div>
