	@if($game->type - zeroOneTeamScores($game, 1)->sum('score') == 0 )
		<div class="panel panel-success">
	@elseif($game->type - zeroOneTeamScores($game, 2)->sum('score') == 0 )
		<div class="panel panel-primary">
	@else
		<div class="panel panel-{{ zeroOneTeamScores($game, 1)->count() <= zeroOneTeamScores($game, 2)->count() ? 'warning' : 'primary' }}">
	@endif
	<div class="panel-heading">
		<div class="panel-title">Team 1</div>
	</div>
	<div class="panel-body">
		<div class="row">
			{!! Form::open(['route' => 'darts.01.scores.teams.store']) !!}
				{{ Form::hidden('game_id', $game->id, ['size'=>3]) }}
				{{ Form::hidden('team_id', 1, ['size'=>3]) }}
				{{ Form::hidden('remainingScore', ($game->type - zeroOneTeamScores($game, 1)->sum('score')), ['size'=>3]) }}
				{{ Form::hidden('game_type', $game->type, ['size'=>3]) }}
				<div class="col-xs-12 col-sm-6">
					<div class="btn-group btn-group-vertical {{ $errors->has('user_id') ? 'has-error' : '' }}" data-toggle="buttons">
						@foreach(zeroOneTeamPlayers($game, 1) as $user)
							{{-- {{ $user->shooting_order }}
							{!! nextShot($game) !!} --}}
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
					@if(($game->type - zeroOneTeamScores($game, 2)->sum('score') == 0) || ($game->type - zeroOneTeamScores($game, 1)->sum('score') == 0))
						<input class="form-control input-lg" type="text" name="score2" style="text-align: center" disabled>
						<br />
						<input class="btn btn-lg btn-default" type="submit" value="Submit" disabled />
					@else
						<div class="form-group {{ $errors->has('score2') ? 'has-error' : '' }}" >
							@if(zeroOneNextShot($game) % 2 == 0)
								<input class="form-control input-lg" type="text" name="score1" style="text-align: center" />
							@else
								<input class="form-control input-lg" type="text" name="score1" style="text-align: center" autofocus />
							@endif
						</div>
						<br />
						<input class="btn btn-lg btn-default" type="submit" name="t2submit" value="Submit" />
					@endif
				</div>
			{{ Form::close() }}
		</div>
	</div>
	<div class="panel-footer">
		Select a player, enter the score and click Submit
	</div>
</div>