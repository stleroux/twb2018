@include('common.controlCenterHeader')
		
	<a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
		<i class="fa fa-users" aria-hidden="true"></i>
		Users
	</a>

	<br />

	<form method="GET" action="{{ route('users.restore', $user->id) }}" accept-charset="UTF-8" style="display:inline">
		{!! csrf_field() !!}
		<button
			class="btn btn-block btn-primary"
			style="margin-top: 6px"
			type="button"
			data-toggle="modal"
			data-target="#restore">
			<i class="fa fa-arrow-up" aria-hidden="true"></i> Restore
		</button>
	</form>

	@if(checkACL('manager'))
		<form method="POST" action="{{ route('users.deleteTrashed', $user->id) }}" accept-charset="UTF-8" style="display:inline">
			<input type="hidden" name="_method" value="delete" />
			{!! csrf_field() !!}
			<button
				class="btn btn-block btn-danger"
				style="margin-top: 6px"
				type="button"
				data-toggle="modal"
				data-target="#delete">
				<i class="glyphicon glyphicon-trash"></i> Delete
			</button>
		</form>
	@endif

@include('common.controlCenterFooter')