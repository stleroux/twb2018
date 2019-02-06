@include('common.controlCenterHeader')
		
{{--	<a href="/" class="btn btn-default btn-block">
			<i class="fa fa-home" aria-hidden="true"></i>
			Home
		</a> --}}

{{-- 	<a href="{{ URL::previous() }}" class="btn btn-default btn-block">
		<i class="fa fa-home" aria-hidden="true"></i>
		Back
	</a> --}}

	{{-- <a href="{{ route('users.index') }}" class="btn btn-block btn-default">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Users
	</a> --}}

   <a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
      <i class="fa fa-users" aria-hidden="true"></i>
      Users
   </a>
   
<br />

	<a href="{{ route('users.resetPwd', $user->id) }}" class="btn btn-block btn-default">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Reset Password
	</a>

	<a href="{{ route('users.edit', $user->id) }}" class="btn btn-block btn-default">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Edit User
	</a>

	<a href="#" class="btn btn-block btn-warning">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Edit Profile
	</a>

	@if(checkACL('manager'))
		<form method="POST" action="{{ route('users.destroy', $user->id) }}" accept-charset="UTF-8" style="display:inline">
			<input type="hidden" name="_method" value="delete" />
			{!! csrf_field() !!}
			<button
				class="btn btn-block btn-danger"
				style="margin-top: 6px"
				type="button"
				data-toggle="modal"
				data-target="#trash"
				{{-- data-title="Trash Article?"
				data-message="Are you sure you want to trash this article?" --}}>
				<i class="glyphicon glyphicon-trash"></i> Trash
			</button>
		</form>
	@endif

@include('common.controlCenterFooter')