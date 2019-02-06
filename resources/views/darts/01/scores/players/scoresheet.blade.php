<div class="col-sm-2">
   <div class="panel panel-primary">
      <div class="panel-heading">
         <div class="panel-title">{{ $player->first_name }}</div>
      </div>
      <div class="panel-body">
         {{-- {{ $game->id }} <br /> --}}
         {{-- {{ $player->user_id }} --}}
         <table class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>No</th>
                  <th class="text-center">Score</th>
                  <th class="text-center">Remaining</th>
               </tr>
            </thead>
            <tbody>
               @php
                  $t1no = zeroOnePlayerScore($game->id, $player->user_id)->count();
               @endphp
               
               @foreach(zeroOnePlayerScore($game->id, $player->user_id) as $score)
                  <tr>
                     <td>{{ $t1no }}</td>
                     <td class="text-center">{{ $score->score }}</td>
                     <td class="text-center">{{ $score->remaining }}</td>
                  </tr>
                  @php
                     $t1no --;
                  @endphp
               @endforeach
            </tbody>
         </table>
      </div>
      {{-- <div class="panel-footer">
         Footer
      </div> --}}
   </div>
</div>