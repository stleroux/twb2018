@if(checkACL('user'))
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Methodology</h3>
			</div>
			<div class="panel-body">
				{!! $recipe->methodology !!}
			</div>
		</div>
	</div>
@endif