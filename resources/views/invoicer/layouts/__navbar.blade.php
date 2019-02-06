<nav class="navbar navbar-default navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- Branding Image -->
					<a class="navbar-brand" href="{{ url('/') }}">
						{{-- {{ config('app.name', 'Invoicer') }} --}}
						INVOICER
					</a>
				</div>

				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav">

						<li class="{{ (Request::is('dashboard*') ? 'active' : '') }}"><a href="{{ route('dashboard') }}">Dashboard 111</a></li>
						<li class="{{ (Request::is('ledger*') ? 'active' : '') }}"><a href="{{ route('ledger') }}">Ledger</a></li>
						<li class="{{ (Request::is('invoices*') ? 'active' : '') }}"><a href="{{ route('invoices.index') }}">Invoices</a></li>
						<li class="{{ (Request::is('clients*') ? 'active' : '') }}"><a href="{{ route('clients.index') }}">Clients</a></li>
						<li class="{{ (Request::is('products*') ? 'active' : '') }}"><a href="{{ route('products.index') }}">Products</a></li>
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						@guest
							<li><a href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('register') }}">Register</a></li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<ul class="dropdown-menu">
									<li>
										<a href="{{ route('logout') }}"
											onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
											Logout
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>