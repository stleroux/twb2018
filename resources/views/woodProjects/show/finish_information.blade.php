@if(checkACL('user'))
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Finish Information</div>
		</div>
		<div class="panel-body">
			<div class="col-xs-4">
				<label for="wood_type">Type</label>
				<div class="well well-xs">
					{{ $project->finish_type_id ? $project->finishType->name : 'N/A' }}
					{{-- {{ $project->finish_type_id or 'N/A' }} --}}
				</div>
			</div>
			<div class="col-xs-4">
				<label for="wood_type">Sheen</label>
				<div class="well well-xs">
					{{ $project->finish_sheen_id ? $project->finishSheen->name : 'N/A' }}
					{{-- {{ $project->finish_sheen_id or 'N/A' }} --}}
				</div>
			</div>
		</div>
	</div>
@endif