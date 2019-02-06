<div class="well well-sm text-center" style="padding-top:4px; padding-bottom:4px; margin-top:0px; margin-bottom:0px;">
   <a href="{{ route('recipes.newRecipes') }}" class="{{ Request::is('recipes') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
   @foreach($letters as $value)
      <a href="{{ route('recipes.newRecipes', $value) }}" class="{{ Request::is('recipes/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
   @endforeach
</div>