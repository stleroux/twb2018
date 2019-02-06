<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-address-card-o" aria-hidden="true"></i>
			Recipe Archives
		</h3>
	</div>
	<div class="panel-body">
		@if(count($recipelinks) > 0)
			<ul class="list-group">
				@foreach($recipelinks as $rlink)
					<a href="{{ route('recipes.archive', ['year'=>$rlink->year, 'month'=>$rlink->month]) }}" class="list-group-item">{{ $rlink->month_name }} - {{ $rlink->year }} <span class="badge">{{ $rlink->recipe_count }}</span></a> 
				@endforeach
			</ul>
		@else
			<div class="text text-center">No Data Available</div>
		@endif
	</div>
</div>