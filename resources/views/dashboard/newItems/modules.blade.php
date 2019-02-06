<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-cubes" aria-hidden="true"></i>
			Modules
		</div>
	</div>

	<div class="panel-body">
		@if($newModules->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Name</th>
						{{-- <th>Created By</th> --}}
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newModules as $module)
						<tr>
							<td>{{ $module->name }}</td>
							{{-- <td>{{ $module->user->username }}</td> --}}
							<td>@include('common.dateFormat', ['model'=>$module, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
