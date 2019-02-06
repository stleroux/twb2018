<div class="panel panel-primary">

	<div class="panel-heading">
		<h4 class="panel-title"><i class="fa fa-id-card-o" aria-hidden="true"></i> Manage Account</h4>
	</div>

	<div class="list-group">

		<a href="{{ route('backend.profile', $user->profile->id) }}" class="list-group-item {{ Nav::isRoute('backend.profile') }}">
			<i class="fa fa-id-card-o" aria-hidden="true"></i>
			My Account
		</a>

	</div>

</div>
