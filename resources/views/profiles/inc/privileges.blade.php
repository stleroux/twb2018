<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">You are logged in with {{ ucfirst(Auth::user()->role->name) }} access!</h3>
		</div>
		<div class="panel-body" style="padding-bottom:0px;">

			<p>The Access Permissions chart below shows what you can or cannot do based on the role you have been granted on the site.</p>
			<p>The Areas Access Permissions chart show what areas of the site you can access based on the role you have been grnated on the site.</p>
			<p>&nbsp;</p>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Access Permissions</h3>
				</div>
				<table class="table table-bordered table-hover table-condensed table-responsive">
					<thead>
						<tr>
							<th></th>
							<th class="hidden-xs text text-center" width="11%">SuperAdmin</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Super Administrator">SA</a></th>
							<th class="hidden-xs text text-center" width="11%">Admin</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Administrator">AD</a></th>
							<th class="hidden-xs text text-center" width="11%">Manager</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Manager">MG</a></th>
							<th class="hidden-xs text text-center" width="11%">Publisher</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Publisher">PB</a></th>
							<th class="hidden-xs text text-center" width="11%">Editor</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Editor">ED</a></th>
							<th class="hidden-xs text text-center" width="11%">Author</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Author">AU</a></th>
							<th class="hidden-xs text text-center" width="11%">User</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="User">US</a></th>
							<th class="hidden-xs text text-center" width="11%">Guest</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Guest">GT</a></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>View All Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="info"></td>
						</tr>
						<tr>
							<td>Manage Profile</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Create Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Edit Own Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="info"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Edit All Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Publish Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Import Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Trash Own Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Trash All Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Delete Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Favorites</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Areas Access Permissions</h3>
				</div>
				<table class="table table-bordered table-hover table-condensed table-responsive">
					<thead>
						<tr>
							<th></th>
							<th class="hidden-xs text text-center" width="11%">SuperAdmin</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Super Administrator">SA</a></th>
							<th class="hidden-xs text text-center" width="11%">Admin</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Administrator">AD</a></th>
							<th class="hidden-xs text text-center" width="11%">Manager</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Manager">MG</a></th>
							<th class="hidden-xs text text-center" width="11%">Publisher</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Publisher">PB</a></th>
							<th class="hidden-xs text text-center" width="11%">Editor</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Editor">ED</a></th>
							<th class="hidden-xs text text-center" width="11%">Author</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Author">AU</a></th>
							<th class="hidden-xs text text-center" width="11%">User</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="User">US</a></th>
							<th class="hidden-xs text text-center" width="11%">Guest</th>
							<th class="hidden-sm hidden-md hidden-lg text text-center"><a href="#" title="Guest">GT</a></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Dashboard</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Articles</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Categories</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Comments</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						{{-- <tr>
							<td>Galleries</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr> --}}
						<tr>
							<td>Items</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Modules</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Photo Albums</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Posts</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Recipes</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Roles</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Users</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
						<tr>
							<td>Wood Projects</td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="success"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
							<td class="danger"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel-footer">
			<table class="table table-condensed" style="margin-bottom: 0px">
				<tr class="text text-center">
					<td width="33%" class="success">Access</td>
					<td width="33%" class="info">Limited Access</td>
					<td width="33%" class="danger">No Access</td>
				</tr>
				<tr>
					<td colspan="3" class="hidden-lg hidden-md hidden-sm">
							SA = SuperAdmin, AD = Admin, MG = Manager, PB = Publisher, ED = Editor, AU = Author, US = User, GT = Guest
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
