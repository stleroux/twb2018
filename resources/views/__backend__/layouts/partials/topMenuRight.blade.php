		<ul class="nav navbar-nav navbar-right">
			{{-- <li>
				<a href="{{ route('product.shoppingCart') }}">
					<i class="fa fa-shopping-cart"></i> Shopping Cart
					<span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
				</a>
			</li> --}}

			@guest
				<li><a href="{{ route('register') }}">Register</a></li>
				<li><a href="{{ route('login') }}">Login</a></li>
			@else
				<ul class="nav navbar-nav">
					@if(View::hasSection('user_guide'))
						<li>
							<a href="#" data-toggle="modal" data-target="#userGuide">
								<i class="fa fa-book" aria-hidden="true"></i>
								User Guide
							</a>
						</li>
					@endif
					<li>
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<span class="text text-danger">
								<i class="fa fa-sign-out" aria-hidden="true"></i>
								Logout
							</span>
						</a>
					</li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</ul>
			@endguest
		</ul>
	</div><!-- /.nav-collapse -->
</nav><!-- /.navbar -->