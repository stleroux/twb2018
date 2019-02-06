<div class="pull-right message">
	
	@if (Session::has('success'))
		<div class="success">
			{{ Session::get('success') }} &nbsp;
		</div>
	@endif
	
	@if (Session::has('danger'))
		<div class="alert alert-danger alert-dismissible alert-sm" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ Session::get('danger') }} &nbsp;
		</div>
	@endif
	
	@if (Session::has('info'))
		<div class="alert alert-info alert-dismissible alert-sm" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ Session::get('info') }} &nbsp;
		</div>
	@endif
	
	@if (Session::has('warning'))
		<div class="alert alert-warning alert-dismissible alert-sm" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ Session::get('warning') }} &nbsp;
		</div>
	@endif

	@if (Session::has('default'))
		<div class="alert alert-default alert-dismissible alert-sm" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ Session::get('default') }} &nbsp;
		</div>
	@endif

	@if (Session::has('error'))
		<div class="danger">
			{{ Session::get('error') }} &nbsp;
		</div>
	@endif
	
</div>
