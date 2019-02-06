<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">Team 1 Scoresheet</div>
	</div>
	<div class="panel-body">
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th class="text-center">Player</th>
					<th class="text-center">Score</th>
					<th class="text-center">Remaining</th>
				</tr>
			</thead>
			<tbody>
				@php
					$t1no = zeroOneTeamScores($game, 1)->count();
				@endphp
				@foreach(zeroOneTeamScores($game, 1) as $score)
					<tr>
						<td>{{ $t1no }}</td>
						<td class="text-center">
							{{ $score->first_name }}
							{{-- {{ $score->username }} --}}
						</td>
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