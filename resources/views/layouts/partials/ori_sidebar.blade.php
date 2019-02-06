{{-- FRONTEND SIDEBAR --}}

<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title">
			<i class="fa fa-folder" aria-hidden="true"></i>
			Content
		</h4>
	</div>

	<div class="list-group">

		<a href="{{ route('homepage') }}" class="list-group-item {{ Nav::isRoute('homepage') }}">
			<i class="fa fa-home" aria-hidden="true"></i>
			Home
		</a>
		
		<a href="{{ route('articles.index') }}" class="list-group-item {{-- {{ Nav::isRoute('articles.index') }} {{ Nav::isRoute('articles.show') }} --}}{{ Nav::hasSegment('articles', 1) }}">
			<i class="fa fa-file-text-o" aria-hidden="true"></i>
			Articles
		</a>

		<a href="{{ route('blog.index') }}"  class="list-group-item {{ Nav::isRoute('blog*') }}">
			<i class="fa fa-newspaper-o" aria-hidden="true"></i>
			Blog
		</a>

		<a href="{{ route('items.index') }}" class="list-group-item {{ Nav::isRoute('items') }}">
			<i class="fa fa-barcode" aria-hidden="true"></i>
			Items
		</a>

		<a href="{{ route('albums.index') }}" class="list-group-item {{ Nav::hasSegment('albums', 1) }}">
			<i class="fa fa-picture-o" aria-hidden="true"></i>
			Photo Albums
		</a>

		<a href="{{ route('recipes.index') }}" class="list-group-item {{ Nav::hasSegment('recipes', 1) }}">
			<i class="fa fa-address-card-o" aria-hidden="true"></i>
			Recipes
		</a>

		<a href="{{ route('woodProjects') }}" class="list-group-item
			{{ Nav::hasSegment('woodProjects',1) }}
			{{ Nav::hasSegment('woodProjectImage',1) }}
			">
			<i class="fa fa-pagelines" aria-hidden="true"></i>
			Woodshop Projects
		</a>

		<a href="{{ route('about') }}" class="list-group-item {{ Nav::isRoute('about') }}">
			<i class="fa fa-question" aria-hidden="true"></i>
			About Us
		</a>

		<a href="{{ route('contact') }}" class="list-group-item {{ Nav::urlDoesContain('/contact') }}">
			<i class="fa fa-phone" aria-hidden="true"></i>
			Contact Us
		</a>

		<a href="{{ route('members') }}" class="list-group-item {{ Nav::urlDoesContain('/members') }}">
			<i class="fa fa-users" aria-hidden="true"></i>
			Our Members
		</a>
	</div>

</div>

		{{-- @section('sectionSidebar') --}}
		{{-- Display the sidebar for the page/section being viewed --}}
	{{-- @show --}}