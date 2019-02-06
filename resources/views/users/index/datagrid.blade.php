<table id="datatable" class="table table-hover table-condensed table-responsive">
	<thead>
		<tr>
			<th><input type="checkbox" id="selectall" class="checked" /></th>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Role</th>
			<th>Email</th>
			<th>Logins</th>
			{{-- @if(checkACL('author'))
				<th data-orderable="false"></th>
			@endif --}}
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
			<tr>
				<td>
					<input type="checkbox" onClick="checkbox_is_checked()" name="checked[]" value="{{$user->id}}" class="check-all">
				</td>
				<td><a href="{{ route('users.show', $user->id) }}">{{ $user->username }}</a></td>
				<td>{{ $user->profile->first_name }}</td>
				<td>{{ $user->profile->last_name }}</td>
				<td>{{ ucfirst($user->role->name) }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->login_count }}</td>
				{{-- <td><a href="{{ route('users.show', $user->id) }}">{{ ucfirst($user->username) }}</a></td> --}}
				{{-- @if(checkACL('author'))
					<td class="text-right">
						@include('layouts.partials.actionsDD', [
							'model'=>$user,
							'name'=>'users',
							'params'=>['changePwd','edit', 'delete']
							
						])
					</td>
				@endif --}}
			</tr>
		@endforeach
	</tbody>
</table>