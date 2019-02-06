<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">Possible Outs</div>
	</div>
	<div class="panel-body">
		@include('darts.inc.possibleOuts', ['score'=>($game->type - zeroOneTeamScores($game, 2)->sum('score'))])
	</div>
</div>