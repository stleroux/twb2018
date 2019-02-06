@if($users->count())
   <li class="label label-default">
      <div style="padding: 5px">{{ $users->count() }} Users</div>
   </li>
@endif