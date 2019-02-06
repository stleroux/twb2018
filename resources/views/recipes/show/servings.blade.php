@if(checkACL('user'))
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Servings</h3>
			</div>
			<div class="panel-body text-center">{{ $recipe->servings }}</div>
		</div>
	</div>
@endif