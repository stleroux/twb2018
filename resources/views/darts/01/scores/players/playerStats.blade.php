<div class="panel panel-primary">
   <div class="panel-heading">
      <div class="panel-title">Players Statistics</div>
   </div>
   <div class="panel-body">
      <table class="table table-hover">
         <thead>
            <tr>
               <th>Player</th>
               <th>Remaining</th>
               <th class="text-center">Best Score</th>
               <th class="text-center">Score Avg</th>
               <th class="text-center">Dart Avg</th>
            </tr>
         </thead>
         <tbody>
            @foreach(zeroOneAllPlayers($game) as $player)
               <tr class="text-center">
                  <td class="text-left">{{ $player->first_name }}</td>
                  <td>Remaining</td>
                  <td>{{ zeroOnePlayerBestScore($player) }}</td>
                  <td>{{ zeroOnePlayerScoreAvg($player) }}</td>
                  <td>{{ zeroOnePlayerDartAvg($player) }}</td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   {{-- <div class="panel-footer">
      Footer
   </div> --}}
</div>
