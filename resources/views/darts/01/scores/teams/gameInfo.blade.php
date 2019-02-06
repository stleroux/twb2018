<div class="panel-group">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Game Info</div>
		</div>
		<div class="panel-body">
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading" style="padding-bottom: 0px; padding-top:0px">
						<div class="panel-title">Remains</div>
					</div>
					<div class="panel-body text-center" style="background-color:{{ ($game->type - zeroOneTeamScores($game, 1)->sum('score') == 0 )?"green":"" }} ">
						{{ $game->type - zeroOneTeamScores($game, 1)->sum('score') }}
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title text-center">Type</div>
					</div>
					<div class="panel-body text-center">
						{{ $game->type }}
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading" style="padding-bottom: 0px; padding-top:0px">
						<div class="panel-title">Remains</div>
					</div>
					<div class="panel-body text-center" style="background-color:{{ ($game->type - zeroOneTeamScores($game, 2)->sum('score') == 0 )?"green":"" }} ">
						{{ $game->type - zeroOneTeamScores($game, 2)->sum('score') }}
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="panel-footer">
			<div class="row">
				<div class="col-xs-6">Next to shoot : {{ nextShot($game) }}</div>
				<div class="col-xs-6">Last to shoot : {{ lastShot($game) }}</div>
			</div>
		</div> --}}
	</div>
	
	@include('darts.01.scores.teams.messages')

	
</div>