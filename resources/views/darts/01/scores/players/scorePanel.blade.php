<div class="panel panel-primary">
   <div class="panel-heading">
      <div class="panel-title">Players</div>
   </div>
   <div class="panel-body">
      <div class="row">
         {!! Form::open(['route' => 'darts.01.scores.players.store']) !!}
            {{ Form::text('game_id', $game->id, ['size'=>3]) }}
            {{-- {{ Form::text('team_id', 1, ['size'=>3]) }} --}}
            {{ Form::text('game_type', $game->type, ['size'=>3]) }}
            <div class="col-xs-12 col-sm-6">
               <div class="btn-group btn-group-vertical {{ $errors->has('user_id') ? 'has-error' : '' }}" data-toggle="buttons">
                  @foreach(zeroOnePlayers($game) as $user)
                  USER ID : {{ $user->user_id }} <br />
                     {{ Form::text('remainingScore', ($game->type - zeroOnePlayerScore($game, $user->user_id)->sum('score')), ['size'=>3]) }}
                     <br />
                     Shooting Order : {{ $user->shooting_order }}
                     <br />
                     Next Shot : {{ zeroOneNextShot($game) }}
                     <br />
                     <label class="btn btn-default {{ ($user->shooting_order == zeroOneNextShot($game)) ? 'active':'' }}">
                        @if($user->shooting_order == zeroOneNextShot($game))
                           {{ Form::radio('user_id', $user->user_id , true) }}
                        @endif
                        {{ Form::radio('user_id', $user->user_id , false) }}
                        {{ $user->first_name }} {{ $user->last_name }}
                     </label>
                  @endforeach
               </div>
            </div>
            <div class="col-xs-12 col-sm-6 text-center">
               {{-- @if(($game->type - zeroOnePlayerScores($game, 2)->sum('score') == 0) || ($game->type - zeroOneTeamScores($game, 1)->sum('score') == 0))
                  <input class="form-control input-lg" type="text" name="score" style="text-align: center" disabled>
                  <br />
                  <input class="btn btn-lg btn-default" type="submit" value="Submit" disabled />
               @else --}}
                  <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}" >
                     {{-- @if(zeroOneNextShot($game) % 2 == 0)
                        <input class="form-control input-lg" type="text" name="score" style="text-align: center" />
                     @else --}}
                        <input class="form-control input-lg" type="text" name="score" style="text-align: center" autofocus />
                     {{-- @endif --}}
                  </div>
                  <br />
                  <input class="btn btn-lg btn-default" type="submit" name="submit" value="Submit" />
               {{-- @endif --}}
            </div>
         {{ Form::close() }}
      </div>
   </div>
   <div class="panel-footer">
      Select a player, enter the score and click Submit
   </div>
</div>