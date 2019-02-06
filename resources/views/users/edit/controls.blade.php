@include('common.controlCenterHeader')

	<a href="{{ route('users.show', $user->id) }}" class="btn btn-block btn-default">
      <i class="fa fa-undo" aria-hidden="true"></i>
      Cancel
   </a>
	
	{{ Form::button('<i class="fa fa-save"></i> Update ', array('type' => 'submit', 'class' => 'btn btn-block btn-primary')) }}

@include('common.controlCenterFooter')