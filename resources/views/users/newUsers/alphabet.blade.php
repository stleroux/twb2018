<div class="well well-sm text text-center">
   <a href="{{ route('users.newUsers') }}" class="{{ Request::is('users/newUsers') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
   @foreach($letters as $value)
      <a href="{{ route('users.newUsers', $value) }}" class="{{ Request::is('users/newUsers/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
   @endforeach
</div>