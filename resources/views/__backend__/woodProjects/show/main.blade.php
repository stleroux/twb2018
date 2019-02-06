{{-- GENERAL INFORMATION --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			General Information
		</h3>
	</div>
	<div class="panel-body panel-body-sm">
		<div class="col-xs-12 col-sm-3 col-md-4">
			<label for="category_id">Category</label>
			<div class="well well-xs">{{ $project->category->name }}</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4">
			<label for="wood_type">Invested Time</label>
			<div class="well well-xs">{{ $project->time_invested ? $project->time_invested . ' hours' : 'N/A' }}</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4">
			<label for="wood_type">Price</label>
			<div class="well well-xs">{{ $project->price ? '$ ' . $project->price . '.00' : 'N/A' }}</div>
		</div>
		<div class="col-xs-12">
			<label for="wood_type">Description</label>
			<div class="well well-xs">{{ $project->description }}</div>
		</div>
	</div>
</div>