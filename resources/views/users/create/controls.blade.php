@include('common.controlCenterHeader')
   
   {{ Form::submit('Create User', ['class'=>'btn btn-block btn-success']) }}
   
   {{-- <a href="{{ route('users.index') }}" class="btn btn-block btn-default">Back</a> --}}
   <a href="{{ Route( Session::get('backURL') ) }}" class="btn btn-default btn-block">
      <i class="fa fa-users" aria-hidden="true"></i>
      Users
   </a>

@include('common.controlCenterFooter')
