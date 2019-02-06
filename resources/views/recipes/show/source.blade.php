@if(checkACL('user'))
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Source</h3>
			</div>
			<div class="panel-body text-center">
				@if ($recipe->source)
					{{ $recipe->source }}
				@else
					N/A
				@endif
			</div>
		</div>
	</div>
@endif