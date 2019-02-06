@extends('darts.layouts.app')

@section('content')

	{!! Form::open(array('route'=>'darts.games.storeTeamPlayers')) !!}
		{{ Form::token() }}
		{{-- Game ID : --}}
		{{ Form::hidden('game_id', $game->id) }}
		{{-- Team 1 No Players : --}}
		{{ Form::hidden('t_players', $game->t1_players) }}
		{{-- Team 2 No Players : --}}
		{{ Form::hidden('t2_players', $game->t2_players) }}

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<div class="panel-title">
					Select Each Team's Player(s) For This Game
				</div>
			</div>
			
			<div class="panel-body panel-bg">
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="panel-title">Team 1 Players</div>
							</div>
							<div class="panel-body">
								@for ($i = 0; $i < $game->t1_players; $i++)
									<div class="col-sm-3">
										<label class="form-label">Player {{ $i + 1 }}:</label>
									</div>
									<div class="col-sm-9">
										<select name="team1players[]" class="form-control">
											<option value="">Select A Player</option>
											@foreach($players as $user)
												<option name="player_{{ $i }}" value="{{ $user->id }}">{{ $user->profile->last_name }}, {{ $user->profile->first_name }}</option>
											@endforeach
										</select>
									</div>
								@endfor
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="panel-title">Team 2 Players</div>
							</div>
							<div class="panel-body">
								@for ($i = 0; $i < $game->t2_players; $i++)
									<div class="col-sm-3">
										<label class="form-label">Player {{ $i + 1 }}:</label>
									</div>
									<div class="col-sm-9">
										<select name="team2players[]" class="form-control">
											<option value="">Select A Player</option>
											@foreach($players as $user)
												<option name="player_{{ $i }}" value="{{ $user->id }}">{{ $user->profile->last_name }}, {{ $user->profile->first_name }}</option>
											@endforeach
										</select>
									</div>
								@endfor
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="panel-footer">
				Fields marked with an<span class="required"></span> are required.
				<span class="pull-right">
					{{ Form::submit ('Create Game', array('class'=>'btn btn-xs btn-default')) }}
				</span>
			</div>
		</div>
	{!! Form::close() !!}
@endsection