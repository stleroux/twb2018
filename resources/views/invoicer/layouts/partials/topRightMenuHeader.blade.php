<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	@if(Auth::user()->role->name == 'guest')
		<i class="fa fa-user-o" aria-hidden="true"></i>
	@elseif(Auth::user()->role->name == 'user')
		<i class="fa fa-user" aria-hidden="true"></i>
	@elseif(Auth::user()->role->name == 'author')
		<i class="fa fa-user-circle-o" aria-hidden="true"></i>
	@elseif(Auth::user()->role->name == 'timeTrack')
		<i class="fa fa-calendar" aria-hidden="true"></i>
	@elseif(Auth::user()->role->name == 'editor')
		<i class="fa fa-user-circle" aria-hidden="true"></i>
	@elseif(Auth::user()->role->name == 'publisher')
		<i class="fa fa-user-plus" aria-hidden="true"></i>
	@elseif(Auth::user()->role->name == 'manager')
		<i class="fa fa-user-times" aria-hidden="true"></i>
	@elseif(Auth::user()->role->name == 'admin')
		<i class="fa fa-user-md" aria-hidden="true"></i>
	@elseif(Auth::user()->role->name == 'superadmin')
		<i class="fa fa-user-secret" aria-hidden="true"></i>
	@endif
	My Account <span class="caret"></span>
</a>