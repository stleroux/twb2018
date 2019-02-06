
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
					@include('layouts.partials.dropdownMenu')
					<li>
						<a href="{{ route('logout') }}"
							class=""
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
				
				<li class="dropdown">
					@include('layouts.partials.topRightMenuHeader')
					<ul class="dropdown-menu">
						<li>
							<div class="navbar-content">
								<div class="row">
									<div class="col-xs-4 text-text-center">
										@if (Auth::user()->image)
											{{ Html::image("images/profiles/" . Auth::user()->image, "", array('height'=>'120','width'=>'100')) }}
										@else
											<div class="text text-center">
												<i class="fa fa-5x fa-user" aria-hidden="true"></i>
											</div>
										@endif
										<p> </p>
									</div>
									<div class="col-xs-8">
										@if(Auth::user()->profile->first_name)
											{{ Auth::user()->profile->first_name }} {{ Auth::user()->profile->last_name }}
										@else
											{{ Auth::user()->username }}
										@endif
									
										@if(Auth::user()->public_email == 1)
											<div class="text-muted small">Email : {{ Auth::user()->email }}</div>
										@endif
										<div class="text-muted small">Username : {{ ucfirst(Auth::user()->username) }}</div>
										<div class="text-muted small">Role : {{ ucfirst(Auth::user()->role->display_name) }}</div>
										<div class="text-muted small">Member Since : @include('common.dateFormat', ['model'=>Auth::user(), 'field'=>'created_at'])</div>
									</div>
								</div>

								<div class="divider"></div>

								<div class="row">
									<div class="col-xs-12">
										<a href="{{ route('profile', Auth::user()->id) }}" class="btn btn-sm btn-block btn-default">
											{{-- <i class="fa fa-user" aria-hidden="true"></i> --}}
											Account Profile
										</a>
										<a href="{{ action('ProfileController@settingsUpdate', ['id'=>Auth::user()->id]) }}" class="btn btn-sm btn-block btn-default">
											Account Preferences
										</a>
										<a href="{{ action('ProfileController@acctUpdate', ['id'=>Auth::user()->id]) }}" class="btn btn-sm btn-block btn-default">
											Account Settings
										</a>
										<a href="{{ action('ProfileController@pwdChange', ['id'=>Auth::user()->id]) }}" class="btn btn-sm btn-block btn-default">
											Change Password
										</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
			@endguest
		</ul>
	</div><!-- /.nav-collapse -->
</nav><!-- /.navbar -->