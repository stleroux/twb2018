{{-- OVERALL DIMENSIONS --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Overall Dimensions <small>(Inches)</small></div>
	</div>
	<div class="panel-body panel-body-sm">
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Width</label>
			<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
				class="pull-right"
				data-title="Overall Width"
				data-content="Dimensions from left to right when facing the item.">
				<i class="fa fa-question-circle" aria-hidden="true"></i>
			</a>
			<div class="well well-xs">{{ $project->width ? $project->width . ' "' : 'N/A' }}</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Depth</label>
			<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
				class="pull-right"
				data-title="Overall Depth"
				data-content="Dimensions from front to back when facing the item.">
				<i class="fa fa-question-circle" aria-hidden="true"></i>
			</a>
			<div class="well well-xs">{{ $project->depth ? $project->depth . ' "' : 'N/A' }}</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-3">
			<label for="wood_type">Height</label>
			<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
				class="pull-right"
				data-title="Overall Height"
				data-content="Dimensions from the floor to the top when facing the item.">
				<i class="fa fa-question-circle" aria-hidden="true"></i>
			</a>
			<div class="well well-xs"> {{ $project->height ? $project->height . ' "' : 'N/A' }}</div>
		</div>
	</div>
</div>