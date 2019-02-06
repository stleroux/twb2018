{{-- WOOD INFORMATION --}}
<div class="panel panel-default">
	{{-- {{ $project->wspecie->name }} --}}
	<div class="panel-heading">
		<div class="panel-title">Wood Information</div>
	</div>
	<div class="panel-body panel-body-sm">
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Type</label>
			<div class="well well-xs">{{ $project->woodType->name or 'N/A' }}</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Specie</label>
			<div class="well well-xs">{{ $project->woodSpecie->name or 'N/A' }}</div>
		</div>
	</div>
</div>