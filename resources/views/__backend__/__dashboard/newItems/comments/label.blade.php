@if($comments->count())
   <li class="label label-default">
      <div style="padding: 5px">{{ $comments->count() }} Comments</div>
   </li>
@endif