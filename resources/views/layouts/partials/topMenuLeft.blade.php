<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">TheWoodBarn.ca</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="{{ Request::is('articles*') ? "active": "" }}">
					<a href="{{ route('articles.index') }}">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						Articles
					</a>
				</li>
				<li class="{{ Request::is('blog*') ? "active": "" }}">
					<a href="{{ route('blog.index') }}">
						<i class="fa fa-newspaper-o" aria-hidden="true"></i>
						Blog
					</a>
				</li>
				<li class="{{ Request::is('albums*') ? "active": "" }}">
					<a href="{{ route('albums.index') }}">
						<i class="fa fa-camera-retro" aria-hidden="true"></i>
						Photo Albums
					</a>
				</li>
				<li class="{{ Request::is('recipes*') ? "active": "" }}">
					<a href="{{ route('recipes.index') }}">
						<i class="fa fa-address-card-o" aria-hidden="true"></i>
						Recipes
					</a>
				</li>
				<li class="{{ Request::is('woodProjects*') ? "active": "" }}">
					<a href="{{ route('woodProjects.index') }}">
						<i class="fa fa-pagelines" aria-hidden="true"></i>
						Wood Projects
					</a>
				</li>
				<li class="{{ (Request::is('darts*') || Request::is('darts*')) ? "active": "" }}">
					<a href="{{ route('darts.index') }}">
						<i class="fa fa-arrow-up" aria-hidden="true"></i>
						Darts
					</a>
				</li>
				<li class="{{ Request::is('invoicer') ? "active": "" }}">
					<a href="{{ route('invoicer.index') }}">
						<i class="fa fa-money" aria-hidden="true"></i>
						Invoicer
					</a>
				</li>
				{{-- <li class="dropdown
					{{ (Request::is('invoicer/home*') ? 'active' : '') }}
					{{ (Request::is('invoicer/ledger*') ? 'active' : '') }}
					{{ (Request::is('invoicer/invoices*') ? 'active' : '') }}
					{{ (Request::is('invoicer/clients*') ? 'active' : '') }}
					{{ (Request::is('invoicer/products*') ? 'active' : '') }}

				">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-money" aria-hidden="true"></i>
						Invoicer
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li class="{{ (Request::is('invoicer/home*') ? 'active' : '') }}"><a href="{{ route('invoicer.home') }}">Home</a></li>
						<li class="{{ (Request::is('invoicer/ledger*') ? 'active' : '') }}"><a href="{{ route('ledger') }}">Ledger</a></li>
						<li class="{{ (Request::is('invoicer/invoices*') ? 'active' : '') }}"><a href="{{ route('invoices.index') }}">Invoices</a></li>
						<li class="{{ (Request::is('invoicer/clients*') ? 'active' : '') }}"><a href="{{ route('clients.index') }}">Clients</a></li>
						<li class="{{ (Request::is('invoicer/products*') ? 'active' : '') }}"><a href="{{ route('products.index') }}">Products</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Administration</li>
						<li class="{{ (Request::is('invoicer/dashboard*') ? 'active' : '') }}"><a href="{{ route('invoicer.dashboard') }}">Dashboard</a></li>
					</ul>
				</li> --}}
			</ul>

