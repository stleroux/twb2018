<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-circle" aria-hidden="true"></i>
			Roles
		</div>
	</div>
	
	<div class="panel-body">
		@if($newRoles->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Title</th>
						{{-- <th>Created By</th> --}}
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newRoles as $role1)
						<tr>
							<td>{{ $role1->display_name }}</td>
							{{-- <td>{{ $role->user->username }}</td> --}}
							<td>@include('common.dateFormat', ['model'=>$role1, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
