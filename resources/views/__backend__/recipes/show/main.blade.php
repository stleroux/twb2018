<div class="panel panel-default">
	<div class="panel-heading">
		<div class="{{ ($recipe->personal)?'text text-danger':''}}">
			{{ ucwords($recipe->title) }}
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			@if ($recipe->image)
				<div class="col-md-8">
			@else
				<div class="col-md-12">
			@endif
				<div class="panel panel-default">
					<div class="panel-heading">Ingredients</div>
					<div class="panel-body">
						{!! $recipe->ingredients !!}
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Methodology</div>
					<div class="panel-body">
						{!! $recipe->methodology !!}
					</div>
				</div>
			</div>
			@if ($recipe->image)
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">Image</div>
						<div class="panel-body text text-center">
							<a href="" data-toggle="modal" data-target="#imageModal">
								{{ Html::image("_recipes/" . $recipe->image, "", array('height'=>'150','width'=>'175')) }}</a>
							</a>
						</div>
					</div>
				</div>
			@endif
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Category</div>
					<div class="panel-body text-center">{{ $recipe->category->name }}</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Servings</div>
					<div class="panel-body text-center">{{ $recipe->servings }}</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Prep Time (Minutes)</div>
					<div class="panel-body text-center">{{ $recipe->prep_time }}</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Cook Time (Minutes)</div>
					<div class="panel-body text-center">{{ $recipe->cook_time }}</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Personal</div>
					<div class="panel-body text-center">
						@if ($recipe->personal)
							<i class="fa fa-check" aria-hidden="true"></i>
						@else
							<i class="fa fa-ban" aria-hidden="true"></i>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Views</div>
					<div class="panel-body text-center">{{ $recipe->views }}</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Source</div>
					<div class="panel-body text-center">
						@if ($recipe->source)
							{{ $recipe->source }}
						@else
							N/A
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Author's Notes</div>
					<div class="panel-body">
						@if ($recipe->public_notes) 
							{!! $recipe->public_notes !!}
						@else
							N/A
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>