<div class="{{ $recipe->image ? 'col-md-8' : 'col-md-12' }}">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Ingredients</h3>
		</div>
		<div class="panel-body">
			@if(checkACL('user'))
				{!! $recipe->ingredients !!}
			@else
				{!! str_limit($recipe->ingredients, $limit = 100, $end = ' [More...]') !!}
			@endif
		</div>
	</div>
</div>
