@if(checkACL('user'))
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Other Information</div>
		</div>
		<div class="panel-body">
			<div class="col-xs-4">
				<label for="wood_type">Completion Date</label>
				<div class="well well-xs">
					@include('common.dateFormat', ['model'=>$project, 'field'=>'completed_at'])
				</div>
			</div>
			<div class="col-xs-4">
				<label for="wood_type">Weight</label>
				<div class="well well-xs">
					@if($project->weight)
						 {{ $project->weight }} Lbs
					@else
						N/A
					@endif
				</div>
			</div>
			<div class="col-xs-4">
				<label for="wood_type">Views</label>
				<div class="well well-xs">
					{{ $project->views + 1}}
				</div>
			</div>
		</div>
	</div>
@endif