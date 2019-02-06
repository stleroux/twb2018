@if($albums->count())
   <li class="label label-default">
      <div style="padding: 5px">{{ $albums->count() }} Albums</div>
   </li>
@endif