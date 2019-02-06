@include('common.controlCenterHeader')

   @guest
      <a href="{{ route('homepage') }}" class="btn btn-default btn-block">
         <i class="fa fa-home" aria-hidden="true"></i>
         Home
      </a>
   @endguest

   @if(checkACL('author'))
      <a href="{{ route('albums.create') }}" class="btn btn-default btn-block">
         <i class="fa fa-plus-square" aria-hidden="true"></i>
         Add Album
      </a>
   @endif

@include('common.controlCenterFooter')
