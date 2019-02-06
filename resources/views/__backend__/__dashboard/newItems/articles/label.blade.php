@if($articles->count())
   <li class="label label-default">
      <div style="padding: 5px">{{ $articles->count() }} Articles</div>
   </li>
@endif