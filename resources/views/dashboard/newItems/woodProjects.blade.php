<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-pagelines" aria-hidden="true"></i>
			Wood Projects
		</div>
	</div>
	
	<div class="panel-body">
		@if($newWoodProjects->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Name</th>
						{{-- <th>Created By</th> --}}
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newWoodProjects as $project)
						<tr>
							<td>{{ $project->name }}</td>
							{{-- <td>{{ $project->user->username }}</td> --}}
							<td>@include('common.dateFormat', ['model'=>$project, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
