@if($recipes->count())
   <li class="label label-default">
      <div style="padding: 5px">{{ $recipes->count() }} Recipes</div>
   </li>
@endif