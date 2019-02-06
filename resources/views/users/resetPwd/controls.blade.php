@include('common.controlCenterHeader')

	<a href="{{ route('users.show', $user->id) }}" class="btn btn-block btn-default">
      <i class="fa fa-undo" aria-hidden="true"></i>
      Cancel
   </a>

	<button type="submit" class="btn btn-block btn-primary">
		<i class="fa fa-users" aria-hidden="true"></i>
      Change Password
	</button>

@include('common.controlCenterFooter')