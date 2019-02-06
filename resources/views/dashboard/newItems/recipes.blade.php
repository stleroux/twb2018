<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="fa fa-address-card-o" aria-hidden="true"></i>
			Recipes
		</div>
	</div>
	
	<div class="panel-body">
		@if($newRecipes->count())
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th>Created By</th>
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newRecipes as $recipe)
						<tr>
							<td>{{ $recipe->title }}</td>
							<td>{{ $recipe->user->username }}</td>
							<td>@include('common.dateFormat', ['model'=>$recipe, 'field'=>'created_at'])</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No new records since your last login
		@endif
	</div>
</div>
