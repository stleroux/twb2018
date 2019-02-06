<div class="panel panel-{{ teamScores($game, 1)->count() <= teamScores($game, 2)->count() ? 'warning' : 'primary' }}">
   <div class="panel-heading">
      <div class="panel-title">Team 1</div>
   </div>
   <div class="panel-body">
      <div class="row">
         {!! Form::open(['route' => 'dartscores.01.store']) !!}
            {{ Form::hidden('game_id', $game->id, ['size'=>3]) }}
            {{ Form::hidden('team_id', 1, ['size'=>3]) }}
            {{ Form::hidden('remainingScore', ($game->type - teamScores($game, 1)->sum('score')), ['size'=>3]) }}
            {{ Form::hidden('game_type', $game->type, ['size'=>3]) }}

            <div class="col-xs-2">
               <div class="btn-group btn-group-vertical {{ $errors->has('user_id') ? 'has-error' : '' }} col-xs-12" data-toggle="buttons">
                  @foreach(teamPlayers($game, 1) as $user)
                     <label class="btn btn-default">
                        <input class="form-check-input" name="user_id" value="{{ $user->user_id}}" type="radio">
                        {{ $user->first_name }} {{ $user->last_name }} 
                     </label>
                  @endforeach
               </div>
            </div>

            <div class="col-xs-8 well text-center">
<form name="form">               
               <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}" >Dart 1: 
                  <input class="d1add btn btn-sm btn-default" data-amount="1" type="button" value="1" />
                  <input class="d1add btn btn-sm btn-default" data-amount="2" type="button" value="2" />
                  <input class="d1add btn btn-sm btn-default" data-amount="3" type="button" value="3" />
                  <input class="d1add btn btn-sm btn-default" data-amount="4" type="button" value="4" />
                  <input class="d1add btn btn-sm btn-default" data-amount="5" type="button" value="5" />
                  <input class="d1add btn btn-sm btn-default" data-amount="6" type="button" value="6" />
                  <input class="d1add btn btn-sm btn-default" data-amount="7" type="button" value="7" />
                  <input class="d1add btn btn-sm btn-default" data-amount="8" type="button" value="8" />
                  <input class="d1add btn btn-sm btn-default" data-amount="9" type="button" value="9" />
                  <input class="d1add btn btn-sm btn-default" data-amount="10" type="button" value="10" />
                  <input class="d1add btn btn-sm btn-default" data-amount="11" type="button" value="11" />
                  <input class="d1add btn btn-sm btn-default" data-amount="12" type="button" value="12" />
                  <input class="d1add btn btn-sm btn-default" data-amount="13" type="button" value="13" />
                  <input class="d1add btn btn-sm btn-default" data-amount="14" type="button" value="14" />
                  <input class="d1add btn btn-sm btn-default" data-amount="15" type="button" value="15" />
                  <input class="d1add btn btn-sm btn-default" data-amount="16" type="button" value="16" />
                  <input class="d1add btn btn-sm btn-default" data-amount="17" type="button" value="17" />
                  <input class="d1add btn btn-sm btn-default" data-amount="18" type="button" value="18" />
                  <input class="d1add btn btn-sm btn-default" data-amount="19" type="button" value="19" />
                  <input class="d1add btn btn-sm btn-default" data-amount="20" type="button" value="20" />
                  <input class="d1reset btn btn-sm btn-default" data-amount="0" type="button" value="Reset" />
               </div>

               
               <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}" >Dart 2: 
                  <input class="d2add btn btn-sm btn-default" data-amount="1" type="button" value="1" />
                  <input class="d2add btn btn-sm btn-default" data-amount="2" type="button" value="2" />
                  <input class="d2add btn btn-sm btn-default" data-amount="3" type="button" value="3" />
                  <input class="d2add btn btn-sm btn-default" data-amount="4" type="button" value="4" />
                  <input class="d2add btn btn-sm btn-default" data-amount="5" type="button" value="5" />
                  <input class="d2add btn btn-sm btn-default" data-amount="6" type="button" value="6" />
                  <input class="d2add btn btn-sm btn-default" data-amount="7" type="button" value="7" />
                  <input class="d2add btn btn-sm btn-default" data-amount="8" type="button" value="8" />
                  <input class="d2add btn btn-sm btn-default" data-amount="9" type="button" value="9" />
                  <input class="d2add btn btn-sm btn-default" data-amount="10" type="button" value="10" />
                  <input class="d2add btn btn-sm btn-default" data-amount="11" type="button" value="11" />
                  <input class="d2add btn btn-sm btn-default" data-amount="12" type="button" value="12" />
                  <input class="d2add btn btn-sm btn-default" data-amount="13" type="button" value="13" />
                  <input class="d2add btn btn-sm btn-default" data-amount="14" type="button" value="14" />
                  <input class="d2add btn btn-sm btn-default" data-amount="15" type="button" value="15" />
                  <input class="d2add btn btn-sm btn-default" data-amount="16" type="button" value="16" />
                  <input class="d2add btn btn-sm btn-default" data-amount="17" type="button" value="17" />
                  <input class="d2add btn btn-sm btn-default" data-amount="18" type="button" value="18" />
                  <input class="d2add btn btn-sm btn-default" data-amount="19" type="button" value="19" />
                  <input class="d2add btn btn-sm btn-default" data-amount="20" type="button" value="20" />
                  <input class="d2reset btn btn-sm btn-default" data-amount="0" type="button" value="Reset" />
               </div>

               
               <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}" >Dart 3: 
                  <input class="d3add btn btn-sm btn-default" data-amount="1" type="button" value="1" />
                  <input class="d3add btn btn-sm btn-default" data-amount="2" type="button" value="2" />
                  <input class="d3add btn btn-sm btn-default" data-amount="3" type="button" value="3" />
                  <input class="d3add btn btn-sm btn-default" data-amount="4" type="button" value="4" />
                  <input class="d3add btn btn-sm btn-default" data-amount="5" type="button" value="5" />
                  <input class="d3add btn btn-sm btn-default" data-amount="6" type="button" value="6" />
                  <input class="d3add btn btn-sm btn-default" data-amount="7" type="button" value="7" />
                  <input class="d3add btn btn-sm btn-default" data-amount="8" type="button" value="8" />
                  <input class="d3add btn btn-sm btn-default" data-amount="9" type="button" value="9" />
                  <input class="d3add btn btn-sm btn-default" data-amount="10" type="button" value="10" />
                  <input class="d3add btn btn-sm btn-default" data-amount="11" type="button" value="11" />
                  <input class="d3add btn btn-sm btn-default" data-amount="12" type="button" value="12" />
                  <input class="d3add btn btn-sm btn-default" data-amount="13" type="button" value="13" />
                  <input class="d3add btn btn-sm btn-default" data-amount="14" type="button" value="14" />
                  <input class="d3add btn btn-sm btn-default" data-amount="15" type="button" value="15" />
                  <input class="d3add btn btn-sm btn-default" data-amount="16" type="button" value="16" />
                  <input class="d3add btn btn-sm btn-default" data-amount="17" type="button" value="17" />
                  <input class="d3add btn btn-sm btn-default" data-amount="18" type="button" value="18" />
                  <input class="d3add btn btn-sm btn-default" data-amount="19" type="button" value="19" />
                  <input class="d3add btn btn-sm btn-default" data-amount="20" type="button" value="20" />
                  <input class="d3reset btn btn-sm btn-default" data-amount="0" type="button" value="Reset" />
               </div>
            </div>

            <div class="col-xs-2">
               Dart 1: <span id="d1total" class="form-control">0</span>
               Dart 2: <span id="d2total" class="form-control">0</span>
               Dart 3: <span id="d3total" class="form-control">0</span>
               Total : <span id="total" class="form-control">0</span>
               {{-- <input class="form-control" type="text" id="total" name="score" style="text-align: center" /> --}}
               @if(($game->type - teamScores($game, 1)->sum('score') == 0) || ($game->type - teamScores($game, 2)->sum('score') == 0))
                  <input class="form-control" type="text" name="score" style="text-align: center" disabled>
                  <br />
                  <input class="btn btn-lg btn-default" type="submit" disabled>
               @else
                  <br />
                  <input class="btn btn-lg btn-default" type="submit" name="t1submit">
               @endif
            </div>


                
            </div>
         {{ Form::close() }}
      </div>
   </div>
   <div class="panel-footer">
      Select a player, enter the score and click Submit
   </div>
</div>