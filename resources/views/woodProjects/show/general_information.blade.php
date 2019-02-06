<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-pagelines" aria-hidden="true"></i>
			General Information
		</h3>
	</div>
	<div class="panel-body">
		<div class="col-xs-4">
			<label for="category_id">Category</label>
			<div class="well well-xs">{{ $project->category->name }}</div>
		</div>
		<div class="col-xs-4">
			<label for="wood_type">Shop Time</label>
			<div class="well well-xs">
				@if($project->time_invested)
					{{ $project->time_invested }} Hours
				@else
					N/A
				@endif
			</div>
		</div>
		<div class="col-xs-4">
			<label for="wood_type">Price</label>
			<div class="well well-xs">{{ $project->price ? '$ ' . $project->price . '.00' : 'N/A' }}</div>
		</div>
		<div class="col-xs-12">
			<label for="wood_type">Description</label>
			<div class="well well-xs">{{ $project->description }}</div>
		</div>
	</div>
</div>
