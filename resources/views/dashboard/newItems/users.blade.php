<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-users" aria-hidden="true"></i>
			Users
		</div>
	</div>
	
	<div class="panel-body">
		@if($newUsers->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Username</th>
						{{-- <th>Created By</th> --}}
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newUsers as $user)
						<tr>
							<td>{{ $user->username }}</td>
							{{-- <td>{{ $user->user->username }}</td> --}}
							<td>@include('common.dateFormat', ['model'=>$user, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
