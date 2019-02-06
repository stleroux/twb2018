{{-- Display list of players involved in each game --}}

{{-- If more than 3 playersper team, display the USERNAME, otherwise display the FIRST_NAME LAST NAME --}}
{{-- @if(teamPlayers($game, 1)->count()) > 3)
	@foreach(teamPlayers($game, 1) as $player)
		{{ $player->username }}
		@if (!$loop->last)
			&nbsp;/&nbsp;
		@endif
	@endforeach
@else
	@foreach(teamPlayers($game, 1) as $player)
		{{ $player->first_name }} {{ $player->last_name }}
		@if (!$loop->last)
			&nbsp;/&nbsp;
		@endif
	@endforeach
@endif
</td>
<td>
@if(teamPlayers($game, 2)->count()) > 3)
	@foreach(teamPlayers($game, 2) as $player)
		{{ $player->username }}
		@if (!$loop->last)
			&nbsp;/&nbsp;
		@endif
	@endforeach
@else
	@foreach(teamPlayers($game, 2) as $player)
		{{ $player->first_name }} {{ $player->last_name }}
		@if (!$loop->last)
			&nbsp;/&nbsp;
		@endif
	@endforeach
@endif --}}



{{-- Display users involved in each game, one per line --}}
	@foreach(teamPlayers($game, 1) as $player)
		{{ $player->username }}
		@if (!$loop->last)
			&nbsp;/&nbsp;
		@endif
	@endforeach
</td>
<td>
	@foreach(teamPlayers($game, 2) as $player)
		{{ $player->username }}
		@if (!$loop->last)
			&nbsp;/&nbsp;
		@endif
	@endforeach


{{-- Display users involved in each game, one per line --}}
{{-- 	@foreach(teamPlayers($game, 1) as $player)
		{{ $player->first_name }} {{ $player->last_name }}
		@if (!$loop->last)
			&nbsp;/&nbsp;
		@endif
	@endforeach
</td>
<td>
	@foreach(teamPlayers($game, 2) as $player)
		{{ $player->first_name }} {{ $player->last_name }}
		@if (!$loop->last)
			&nbsp;/&nbsp;
		@endif
	@endforeach