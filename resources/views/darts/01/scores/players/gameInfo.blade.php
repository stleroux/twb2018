<div class="panel-group">
   <div class="panel panel-primary">
      <div class="panel-heading">
         <div class="panel-title">Game Info</div>
      </div>
      <div class="panel-body">
         <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <div class="panel-title text-center">Type</div>
               </div>
               <div class="panel-body text-center">
                  {{ $game->type }}
               </div>
            </div>
         </div>
      </div>
   </div>

   @include('darts.01.scores.players.messages')
   
</div>