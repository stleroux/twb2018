@include('common.controlCenterHeader')
   
   <a href="{{ route('users.create') }}" class="btn btn-default btn-block">
      <i class="fa fa-plus-square" aria-hidden="true"></i>
      Add User
   </a>

   @include('users.common.bulkActions', ['buttons'=>['deleteAll','restoreAll']])

@include('common.controlCenterFooter')