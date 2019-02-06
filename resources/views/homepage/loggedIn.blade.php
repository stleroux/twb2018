@auth
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Welcome {{ Auth::user()->profile->first_name }}</div>
		</div>
		<div class="panel-body">
			<p>You are logged in with {{ ucfirst(Auth::user()->role->name) }} access!</p>
			{{-- <table class="table table-bordered table-hover table-condensed table-responsive">
				<thead>
					<tr>
						<th></th>
						<th class="hidden-xs">SuperAdmin</th>
						<th class="hidden-sm hidden-md hidden-lg"><a href="#" title="Super Administrator">SA</a></th>
						<th class="hidden-xs">Admin</th>
						<th class="hidden-sm hidden-md hidden-lg"><a href="#" title="Administrator">AD</a></th>
						<th class="hidden-xs">Manager</th>
						<th class="hidden-sm hidden-md hidden-lg"><a href="#" title="Manager">MG</a></th>
						<th class="hidden-xs">Publisher</th>
						<th class="hidden-sm hidden-md hidden-lg"><a href="#" title="Publisher">PB</a></th>
						<th class="hidden-xs">Editor</th>
						<th class="hidden-sm hidden-md hidden-lg"><a href="#" title="Editor">ED</a></th>
						<th class="hidden-xs">Author</th>
						<th class="hidden-sm hidden-md hidden-lg"><a href="#" title="Author">AU</a></th>
						<th class="hidden-xs">User</th>
						<th class="hidden-sm hidden-md hidden-lg"><a href="#" title="User">US</a></th>
						<th class="hidden-xs">Guest</th>
						<th class="hidden-sm hidden-md hidden-lg"><a href="#" title="Guest">GT</a></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>View</td>
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
						<td>Profile</td>
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
						<td>Create</td>
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
						<td>Edit Own</td>
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
						<td>Edit All</td>
						<td class="success"></td>
						<td class="success"></td>
						<td class="success"></td>
						<td class="success"></td>
						<td class="success"></td>
						<td class="danger"></td>
						<td class="danger"></td>
						<td class="danger"></td>
					</tr>
				</tbody>
			</table> --}}
		</div>
		<div class="panel-footer">
			{{-- <table class="table table-condensed" style="margin-bottom: 0px">
				<tr>
					<td class="success">Access</td>
					<td class="info">Limited Access</td>
					<td class="danger">No Access</td>
				</tr>
			</table> --}}
		</div>
		{{-- <div class="hidden-lg hidden-md hidden-sm panel-footer">
			SA = SuperAdmin,
			AD = Admin, 
			MG = Manager, 
			PB = Publisher, 
			ED = Editor, 
			AU = Author, 
			US = User, 
			GT = Guest
		</div> --}}
	</div>
@endauth