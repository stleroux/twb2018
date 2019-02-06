<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">Game Statistics</div>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th></th>
					<th class="text-center">Team 1</th>
					<th class="text-center">Team 2</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-center">
					<th>Best Score</th>
					<td>{{ zeroOneTeamBestScore($game, 1) }}</td>
					<td>{{ zeroOneTeamBestScore($game, 2) }}</td>
				</tr>
				<tr class="text-center">
					<th>Best Score By</th>
					<td>{{ zeroOneTeamBestScoreBy($game, 1) }}</td>
					<td>{{ zeroOneTeamBestScoreBy($game, 2) }}</td>
				</tr>
				<tr class="text-center">
					<th>Score Avg</th>
					<td>{{ (zeroOneTeamScores($game, 1)->sum('score') ? number_format(zeroOneTeamScores($game, 1)->sum('score') / zeroOneTeamScores($game, 1)->count(), 2) : 'N/A') }}</td>
					<td>{{ (zeroOneTeamScores($game, 2)->sum('score') ? number_format(zeroOneTeamScores($game, 2)->sum('score') / zeroOneTeamScores($game, 2)->count(), 2) : 'N/A') }}</td>
				</tr>
				<tr class="text-center">
					<th>Avg Score Per Dart</th>
					<td>{{ (zeroOneTeamScores($game, 1)->sum('score') ? number_format((zeroOneTeamScores($game, 1)->sum('score') / zeroOneTeamScores($game, 1)->count()) / 3, 2 ) : 'N/A') }}</td>
					<td>{{ (zeroOneTeamScores($game, 2)->sum('score') ? number_format((zeroOneTeamScores($game, 2)->sum('score') / zeroOneTeamScores($game, 2)->count()) / 3, 2 ) : 'N/A') }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	{{-- <div class="panel-footer">
		Footer
	</div> --}}
</div>
