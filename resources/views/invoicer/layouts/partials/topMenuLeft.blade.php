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
				
				<li class="{{ Request::is('invoicer/index') ? "active": "" }}">
					<a href="{{ route('invoicer.index') }}">
						<i class="fa fa-money" aria-hidden="true"></i>
						Invoicer
					</a>
				</li>
				
				<li class="{{ (Request::is('invoicer/dashboard') ? 'active' : '') }}">
					<a href="{{ route('invoicer.dashboard') }}">
						<i class="fa fa-cog" aria-hidden="true"></i>
						Dashboard
					</a>
				</li>
				
				<li class=" {{ (Request::is('invoicer/ledger*') ? 'active' : '') }}">
					<a href="{{ route('invoicer.ledger') }}">
						<i class="fa fa-book" aria-hidden="true"></i>
						Ledger
					</a>
				</li>
				
				<li class=" {{ (Request::is('invoicer/invoices*') ? 'active' : '') }}">
					<a href="{{ route('invoicer.invoices.index') }}">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						Invoices
					</a>
				</li>
				
				<li class=" {{ (Request::is('invoicer/clients*') ? 'active' : '') }}">
					<a href="{{ route('invoicer.clients.index') }}">
						<i class="fa fa-users" aria-hidden="true"></i>
						Clients
					</a>
				</li>
				
				<li class=" {{ (Request::is('invoicer/products*') ? 'active' : '') }}">
					<a href="{{ route('invoicer.products.index') }}">
						<i class="fa fa-product-hunt" aria-hidden="true"></i>
						Products
					</a>
				</li>

			</ul>

			
						
					

