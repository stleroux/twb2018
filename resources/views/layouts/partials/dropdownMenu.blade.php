<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		Settings <span class="caret"></span>
	</a>

	<ul class="dropdown-menu">
		<li>
			<a href="{{ route('dashboard') }}">
				<i class="fa fa-cogs" aria-hidden="true"></i>
				Dashboard
			</a>
		</li>

		<li>
			<a href="{{ route('categories.index') }}">
				<i class="fa fa-sitemap" aria-hidden="true"></i>
				Categories
			</a>
		</li>

		<li>
			<a href="{{ route('items.index') }}">
				<i class="fa fa-list" aria-hidden="true"></i>
				Items
			</a>
		</li>

		<li>
			<a href="{{ route('users.index') }}">
				<i class="fa fa-users" aria-hidden="true"></i>
				Users
			</a>
		</li>

		<li>
			<a href="{{ route('roles.index') }}">
				<i class="fa fa-cog" aria-hidden="true"></i>
				Roles
			</a>
		</li>

		<li>
			<a href="#">
			 
			</a>
		</li>
	</ul>

</li>