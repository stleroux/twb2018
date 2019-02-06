@if(checkACL('user'))
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Overall Dimensions <small>(Inches)</small></div>
		</div>
		<div class="panel-body">
			<div class="col-xs-4">
				<label for="wood_type">Width</label>
				<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
					class="pull-right"
					data-title="Overall Width"
					data-content="Dimensions from left to right when facing the item.">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				<div class="well well-xs">{{ $project->width or 'N/A' }}</div>
			</div>
			<div class="col-xs-4">
				<label for="wood_type">Depth</label>
				<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
					class="pull-right"
					data-title="Overall Depth"
					data-content="Dimensions from front to back when facing the item.">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				<div class="well well-xs">{{ $project->depth or 'N/A' }}</div>
			</div>
			<div class="col-xs-4">
				<label for="wood_type">Height</label>
				<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
					class="pull-right"
					data-title="Overall Height"
					data-content="Dimensions from the floor to the top when facing the item.">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				<div class="well well-xs"> {{ $project->height or 'N/A' }}</div>
			</div>
		</div>
	</div>
@endif