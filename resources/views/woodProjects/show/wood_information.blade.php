@if(checkACL('user'))
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Wood Information</div>
		</div>
		<div class="panel-body">
			<div class="col-xs-4">
				<label for="wood_type">Specie</label>
				<div class="well well-xs">{{ $project->wood_specie_id ? $project->woodSpecie->name : 'N/A' }}</div>
			</div>
			<div class="col-xs-4">
				<label for="wood_type">Type</label>
				<div class="well well-xs">{{ $project->wood_type_id ? $project->woodType->name : 'N/A' }}</div>
			</div>
		</div>
	</div>
@endif