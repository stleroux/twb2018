<div class="panel text-center" style="padding-top:5px; padding-bottom: 5px;">
   <a href="{{ route('recipes.index', $key='all') }}" class="{{ Request::is('recipes/all') ? "btn-primary": "btn-default" }} btn btn-sm alphabet">All</a>
   @foreach($letters as $value)
      <a href="{{ route('recipes.index', $value) }}" class="{{ Request::is('recipes/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm alphabet">{{ strtoupper($value) }}</a>
   @endforeach
</div>
<br />