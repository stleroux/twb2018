@if(checkACL('user'))
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Author's Notes</h3>
			</div>
			<div class="panel-body">
				@if ($recipe->public_notes) 
					{!! $recipe->public_notes !!}
				@else
					N/A
				@endif
			</div>
		</div>
	</div>
@endif