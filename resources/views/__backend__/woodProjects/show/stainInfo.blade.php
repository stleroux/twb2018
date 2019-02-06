{{-- STAIN INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Stain Information</div>
	</div>
	<div class="panel-body panel-body-sm">
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Type</label>
			<div class="well well-xs">{{ $project->stainType->name or 'N/A' }}</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Color</label>
			<div class="well well-xs">{{ $project->stainColor->name or 'N/A' }}</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Sheen</label>
			<div class="well well-xs">{{ $project->stainSheen->name or 'N/A' }}</div>
		</div>
	</div>
</div>