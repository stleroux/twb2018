@section('sectionSidebar')
	{{-- Display the sidebar for the page/section being viewed --}}
@show

{{-- Sidebar --}}
			<div class="panel-group" id="accordion">
	
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseContent" style="display: block; text-decoration: none;">
								<i class="fa fa-folder" aria-hidden="true"></i>
								Content
							</a>
						</h4>
					</div>

					<div id="collapseContent" class="panel-collapse collapse in">
						<table class="table table-hover">
							<tr>
								<td class="{{ Request::is('home*') ? "active": "" }}">
									<a href="{{ route('homepage') }}" style="display: block; text-decoration: none;">
										<i class="fa fa-home" aria-hidden="true"></i>
										Home
									</a>
								</td>
							</tr>
{{--               <tr>
								<td class="{{ Request::is('dashboard*') ? "active": "" }}">
									<a href="{{ route('dashboard') }}" style="display: block; text-decoration: none;">
										<i class="fa fa-cubes" aria-hidden="true"></i>
										Dashboard
									</a>
								</td>
							</tr> --}}
							<tr>
								<td class="{{ Request::is('articles*') ? "active": "" }}">
									<a href="{{ route('articles.index') }}" style="display: block; text-decoration: none;">
										<i class="fa fa-id-card-o" aria-hidden="true"></i>
										Articles
									</a>
								</td>
							</tr>
							
							<tr>
								<td class="{{ Request::is('articles*') ? "active": "" }}">
									<a href="{{ route('frontArticles') }}" style="display: block; text-decoration: none;">
										<i class="fa fa-id-card-o" aria-hidden="true"></i>
										Articles
									</a>
								</td>
							</tr>

							<tr>
								<td class="{{ Request::is('blog*') ? "active": "" }}">
									<a href="{{-- {{ route('articles.index') }} --}}" style="display: block; text-decoration: none;">
										<i class="fa fa-newspaper-o" aria-hidden="true"></i>
										Blog
									</a>
								</td>
							</tr>
							{{-- @if(checkACL('admin')) --}}
								<tr>
									<td class="{{ Request::is('items*') ? "active": "" }}">
										<a href="{{ route('items') }}" style="display: block; text-decoration: none;">
											<i class="fa fa-barcode" aria-hidden="true"></i>
											Items
										</a>
									</td>
								</tr>
							{{-- @endif --}}
							<tr>
								<td class="{{ Request::is('recipes*') ? "active": "" }}">
									<a href="{{ route('recipes') }}" style="display: block; text-decoration: none;">
										<i class="fa fa-list" aria-hidden="true"></i>
										Recipes
									</a>
								</td>
							</tr>
							<tr>
								<td class="{{-- {{ Request::is('recipes*') ? "active": "" }} --}}">
									<a href="{{-- {{ route('recipes') }} --}}" style="display: block; text-decoration: none;">
										<i class="fa fa-shopping-basket" aria-hidden="true"></i>
										Shop
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="{{ route('about') }}" style="display: block; text-decoration: none;">
										<i class="fa fa-question" aria-hidden="true"></i>
										About Us
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="{{ route('contact') }}" style="display: block; text-decoration: none;">
										<i class="fa fa-phone" aria-hidden="true"></i>
										Contact Us
									</a>
								</td>
							</tr>
						</table>
					</div> {{-- End of CollapseContent --}}
				</div> {{-- End of Panel --}}

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseModules" style="display: block; text-decoration: none;">
								<i class="fa fa-th" aria-hidden="true"></i>
								Modules
							</a>
						</h4>
					</div>
					<div id="collapseModules" class="panel-collapse collapse">
						<table class="table table-hover">
							<tr>
								<td>
									<a href="#" style="display: block; text-decoration: none;">
										Orders
										<span class="label label-success pull-right">$ 320</span>
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#" style="display: block; text-decoration: none;">Invoices</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#" style="display: block; text-decoration: none;">Shipments</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#" style="display: block; text-decoration: none;">Tex</a>
								</td>
							</tr>
						</table>
					</div> {{-- End of CollpaseModules --}}
				</div>

				{{-- @if(Auth::check()) --}}
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseAccount" style="display: block; text-decoration: none;">
									<i class="fa fa-user" aria-hidden="true"></i>
									My Account
								</a>
							</h4>
						</div>

						<div id="collapseAccount" class="panel-collapse collapse">
							<table class="table table-hover">
								<tr>
									<td>
										<a href="#" style="display: block; text-decoration: none;">Change Password</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="#" style="display: block; text-decoration: none;">
											Notifications
											<span class="label label-info pull-right">5</span>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="#" style="display: block; text-decoration: none;">Import/Export</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="#" class="text-danger" style="display: block; text-decoration: none;">
											<i class="fa fa-trash" aria-hidden="true"></i>
											Disable Account
										</a>
									</td>
								</tr>
							</table>
						</div> {{-- End of CollapseAccount --}}
					</div> {{-- End of Panel --}}
				{{-- @endif --}}

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseReports" style="display: block; text-decoration: none;">
								<i class="fa fa-file-text" aria-hidden="true"></i>
								Reports
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
					</div> {{-- End of CollapseReports --}}
				</div>
			</div>