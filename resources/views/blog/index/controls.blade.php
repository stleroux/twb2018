@include('common.controlCenterHeader')

   <a href="/" class="btn btn-default btn-block">
      <i class="fa fa-home" aria-hidden="true"></i> Home
   </a>

      <a href="{{ route('posts.create') }}" class="btn btn-default btn-block">
      <i class="fa fa-plus" aria-hidden="true"></i> Add
   </a>

@include('common.controlCenterFooter')
