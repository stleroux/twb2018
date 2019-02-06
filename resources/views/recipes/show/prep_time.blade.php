@if(checkACL('user'))
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Prep Time <small>(Minutes)</small></h3>
			</div>
			<div class="panel-body text-center">{{ $recipe->prep_time }}</div>
		</div>
	</div>
@endif