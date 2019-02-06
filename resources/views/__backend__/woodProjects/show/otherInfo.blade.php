{{-- OTHER INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Other Information</div>
	</div>
	<div class="panel-body panel-body-sm">
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Completed Date</label>
			<div class="well well-xs">
				@include('common.dateFormat', ['model'=>$project, 'field'=>'completed_at'])
			</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Weight</label>  <small>(Lbs)</small>
			<div class="well well-xs">{{ $project->weight or 'N/A' }}</div>
		</div>
	</div>
</div>