@auth
	@if(
		(Auth::user()->profile->first_name == '') OR
		(Auth::user()->profile->last_name == '') OR
		(Auth::user()->profile->telephone == ''))
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-exclamation" aria-hidden="true"></i>
						Your user profile is incomplete!
					</h3>
				</div>
				<div class="panel-body">
					Please rectify this oversight by clicking <a href="{{ route('profile', Auth::user()->id) }}">here</a>
				</div>
			</div>
	@endif
@endauth
