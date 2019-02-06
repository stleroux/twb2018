@if($recipe->image)
	<div class="col-md-4">
		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<h3 class="panel-title">Image</h3>
			</div>
			
			<div class="panel-body text text-center">
				@if(checkACL('user'))
					<a href="" data-toggle="modal" data-target="#imageModal">
						{{-- {{ Html::image("_recipes/" . $recipe->image, "", array('height'=>'150','width'=>'175')) }} --}}
						{{ Html::image("_recipes/" . $recipe->image, "", array('class'=>'img-responsive img-rounded')) }}
					</a>
				@else
					{{-- {{ Html::image("_recipes/" . $recipe->image, "", array('height'=>'150','width'=>'175')) }} --}}
					{{ Html::image("_recipes/" . $recipe->image, "", array('class'=>'img-responsive img-rounded')) }}
				@endif
			</div>

		</div>
	</div>
@endif