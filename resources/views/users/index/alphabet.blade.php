<div class="well well-sm text text-center">
   <a href="{{ route('users.index') }}" class="{{ Request::is('users') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
   @foreach($letters as $value)
      <a href="{{ route('users.index', $value) }}" class="{{ Request::is('users/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
   @endforeach
</div>