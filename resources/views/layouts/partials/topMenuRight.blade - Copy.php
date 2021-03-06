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
				@if(checkACL('author'))
					<ul class="nav navbar-nav">
						<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
					</ul>
				@endif

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						@if(Auth::user()->role->name == 'guest')
							<i class="fa fa-user-o" aria-hidden="true"></i>
						@elseif(Auth::user()->role->name == 'user')
							<i class="fa fa-user" aria-hidden="true"></i>
						@elseif(Auth::user()->role->name == 'author')
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						@elseif(Auth::user()->role->name == 'timeTrack')
							<i class="fa fa-calendar" aria-hidden="true"></i>
						@elseif(Auth::user()->role->name == 'editor')
							<i class="fa fa-user-circle" aria-hidden="true"></i>
						@elseif(Auth::user()->role->name == 'publisher')
							<i class="fa fa-user-plus" aria-hidden="true"></i>
						@elseif(Auth::user()->role->name == 'manager')
							<i class="fa fa-user-times" aria-hidden="true"></i>
						@elseif(Auth::user()->role->name == 'admin')
							<i class="fa fa-user-md" aria-hidden="true"></i>
						@elseif(Auth::user()->role->name == 'superadmin')
							<i class="fa fa-user-secret" aria-hidden="true"></i>
						@endif
						My Account <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="navbar-content">
								<div class="col-xs-4 text-text-center">
									<div class="row">
										@if (Auth::user()->image)
											{{ Html::image("images/profiles/" . Auth::user()->image, "", array('height'=>'120','width'=>'100')) }}
										@else
											<div class="text text-center">
												<i class="fa fa-5x fa-user" aria-hidden="true"></i>
											</div>
										@endif
										<p> </p>
									</div>
								</div>
								<div class="col-xs-8">
									<div class="row">
										@if(Auth::user()->profile->first_name)
											{{ Auth::user()->profile->first_name }} {{ Auth::user()->profile->last_name }}
										@else
											{{ Auth::user()->username }}
										@endif
									</div>
									@if(Auth::user()->public_email == 1)
										<div class="text-muted small">Email : {{ Auth::user()->email }}</div>
									@endif
									<div class="text-muted small">Username : {{ ucfirst(Auth::user()->username) }}</div>
									<div class="text-muted small">Role : {{ ucfirst(Auth::user()->role->display_name) }}</div>
									<div class="text-muted small">Member Since : @include('common.dateFormat', ['model'=>Auth::user(), 'field'=>'created_at'])</div>
									<div class="divider"></div>

									@if(checkACL('manager'))
										<a href="{{ route('dashboard') }}" class="btn btn-default btn-xs btn-block">
											<i class="fa fa-tachometer" aria-hidden="true"></i>
											Dashboard
										</a>
									@endif

									<div class="divider"></div>

									<a href="{{ route('profile', Auth::user()->id) }}" class="btn btn-xs btn-block btn-default">
										<i class="fa fa-user" aria-hidden="true"></i>
										Account Profile
									</a>

									<a href="{{ action('Frontend\ProfileController@settingsUpdate', ['id'=>Auth::user()->id]) }}" class="btn btn-xs btn-block btn-default">
										Account Preferences
									</a>

									<a href="{{ action('Frontend\ProfileController@acctUpdate', ['id'=>Auth::user()->id]) }}" class="btn btn-xs btn-block btn-default">
										Account Settings
									</a>
									<a href="{{ action('Frontend\ProfileController@pwdChange', ['id'=>Auth::user()->id]) }}" class="btn btn-xs btn-block btn-default">
										Change Password
									</a>										
								</div>
								</div>
							</div>

							<div class="navbar-footer clearfix">
								<div class="navbar-footer-content">
									<div class="divider"></div>
									<div class="row center-block">
										<div class="col-xs-12">
											<a href="{{ route('logout') }}"
												class="btn btn-sm btn-block btn-danger"
												onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												<i class="fa fa-sign-out" aria-hidden="true"></i>
												Logout
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</div>
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