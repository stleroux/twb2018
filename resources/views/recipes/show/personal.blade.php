@if(checkACL('user'))
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Personal</h3>
			</div>
			<div class="panel-body text-center">
				@if ($recipe->personal)
					<i class="fa fa-check" aria-hidden="true"></i>
				@else
					<i class="fa fa-ban" aria-hidden="true"></i>
				@endif
			</div>
		</div>
	</div>
@endif