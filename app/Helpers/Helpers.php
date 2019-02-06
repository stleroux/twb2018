<?php

function checkACL($acl) {
	if(Auth::check()) {
		if ($acl == 'guest') {
			if (Auth::user()->role_id <= 80) {
				return true;
			}
		} elseif ($acl == 'user') {
			if (Auth::user()->role_id <= 70) {
				return true;
			}
		// } elseif ($acl == 'author_posts') {
		// 	if (Auth::user()->role_id <= 61) {
		// 		return true;
		// 	}
		} elseif ($acl == 'author') {
			if (Auth::user()->role_id <= 60) {
				return true;
			}
		} elseif ($acl == 'timeTrack') {
			if (Auth::user()->role_id <= 55) {
				return true;
			}
		} elseif ($acl == 'editor') {
			if (Auth::user()->role_id <= 50) {
				return true;
			}
		} elseif ($acl == 'publisher') {
			if (Auth::user()->role_id <= 40) {
				return true;
			}
		} elseif ($acl == 'manager') {
			if (Auth::user()->role_id <= 30) {
				return true;
			}
		} elseif ($acl == 'admin') {
			if (Auth::user()->role_id <= 20) {
				return true;
			}
		} elseif ($acl == 'superadmin') {
			if (Auth::user()->role_id <= 10) {
				return true;
			}
		}
	}
}


function checkOwner($model) {
	if(Auth::check()) {
		if($model->user_id == Auth::user()->id) {
			//return 'checkOwner';
			return true;
		}
	}
}


function checkPerm($user_id) {
	// check if specific user can access specific page/module
}


function getClientIP(){
	return $_SERVER["REMOTE_ADDR"];
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ██████╗  █████╗ ██████╗ ████████╗███████╗
// ██╔══██╗██╔══██╗██╔══██╗╚══██╔══╝██╔════╝
// ██║  ██║███████║██████╔╝   ██║   ███████╗
// ██║  ██║██╔══██║██╔══██╗   ██║   ╚════██║
// ██████╔╝██║  ██║██║  ██║   ██║   ███████║
// ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚══════╝
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function zeroOnePlayerBestScore($player) {
	//dd($player);
	$val = DB::table('dartscores')
		->where('game_id', $player->dartgame_id)
		->where('team_id', $player->team_id)
		->where('user_id', $player->id)
		->max('score');

	if($val == 0)
	{
		return 'N/A';
	}

	return $val;
}


function zeroOnePlayerScoreAvg($player) {
	$shots = DB::table('dartscores')
		->where('game_id', $player->dartgame_id)
		->where('team_id', $player->team_id)
		->where('user_id', $player->id)
		->count();
	
	if($shots == 0)
	{
		return 'N/A';
	}

	$totaluserscore = DB::table('dartscores')
		->where('game_id', $player->dartgame_id)
		->where('team_id', $player->team_id)
		->where('user_id', $player->id)
		->sum('score');

	$val = $totaluserscore / $shots;

	return number_format($val, 2);
}


function zeroOnePlayerDartAvg($player) {
	$shots = DB::table('dartscores')
		->where('game_id', $player->dartgame_id)
		->where('team_id', $player->team_id)
		->where('user_id', $player->id)
		->count();

	if($shots == 0) { return 'N/A'; }

	$totaluserscore = DB::table('dartscores')
		->where('game_id', $player->dartgame_id)
		->where('team_id', $player->team_id)
		->where('user_id', $player->id)
		->sum('score');

	$val = ($totaluserscore / $shots) / 3;

	return number_format($val, 2);
}


function zeroOneTeamBestScore($game, $team) {
	$val = DB::table('dartscores')
		->join('dartgame_user', 'dartscores.user_id', '=', 'dartgame_user.user_id')
		->where('game_id', $game->id)
		->where('dartscores.team_id', $team)
		->max('score');

	if($val == 0) { return 'N/A'; }

	return $val;
}


function zeroOneTeamBestScoreBy($game, $team) {
	$v1 = DB::table('dartscores')
		->where('game_id', $game->id)
		->where('team_id', $team)
		->orderby('score','desc')
		->first();

	if(!$v1) { return 'N/A'; }

	$val = DB::table('Users')
		->join('profiles', 'users.id', '=', 'profiles.user_id')
		->where('users.id', '=', $v1->user_id)
		->first();

	return $val->first_name;
}

	
function zeroOneTeamScores($game, $team) {
	$t = DB::table('dartscores')
		->join('users', 'dartscores.user_id', '=', 'users.id')
		->join('profiles', 'dartscores.user_id', '=', 'profiles.user_id')
		->where('game_id', $game->id)
		->where('team_id', $team)
		->orderBy('dartscores.id','desc')
		->get();

	return $t;
}


function zeroOneTeamPlayers($game, $team) {
	$teamPlayers = DB::table('dartgame_user')
		->join('users', 'dartgame_user.user_id', '=', 'users.id')
		->join('profiles', 'dartgame_user.user_id', '=', 'profiles.user_id')
		->where('dartgame_id', $game->id)
		->where('team_id', $team)
		->orderBy('dartgame_user.id', 'asc')
		->get();

	return $teamPlayers;
}


function zeroOnePlayers($game) {
	$teamPlayers = DB::table('dartgame_user')
		->join('users', 'dartgame_user.user_id', '=', 'users.id')
		->join('profiles', 'dartgame_user.user_id', '=', 'profiles.user_id')
		->where('dartgame_id', $game->id)
		->orderBy('dartgame_user.id', 'asc')
		->get();
	//dd($teamPlayers);
	return $teamPlayers;
}


function zeroOneAllPlayers($game) {
	$allPlayers = DB::table('dartgame_user')
		->join('users', 'dartgame_user.user_id', '=', 'users.id')
		->join('profiles', 'dartgame_user.user_id', '=', 'profiles.user_id')
		->where('dartgame_id', $game->id)
		->orderBy('profiles.first_name', 'asc')
		->get();

	return $allPlayers;
}


function zeroOneGameWinner($game) {
	if ($winner = DB::table('dartscores')
		->where('game_id', $game->id)
		->where('remaining', 0)
		->first())
	{
		return 'Team ' . $winner->team_id;
	}
}


function zeroOneLastShot($game) {
	
	$last = DB::table('dartscores')
		//->join('users', 'dartscores.user_id', '=', 'users.id')
		->join('dartgame_user', 'dartscores.user_id', '=', 'dartgame_user.user_id')
		->where('game_id', $game->id)
		->latest('dartscores.id')
		->first();
		//dd($last);
	
	if($last){
	// 	// Return last player to shoot
		//echo "LAST : " . $last->user_id . "<br />";
		//dd($last->shooting_order);
		return $last->shooting_order;
	 	
	}
}


function zeroOneNextShot($game) {
	$totalPlayers = DB::table('dartgame_user')
		->where('dartgame_id', $game->id)
		->orderBy('shooting_order', 'asc')
		->count();
		//echo '<br />Total Players : ' . ($totalPlayers) . '<br />'; 

	// if(lastShot($game)) {
	if (zeroOneLastShot($game)) {
		//echo 'Last Shot : ' . zeroOneLastShot($game) . "<br />";
		$i = zeroOneLastShot($game) + 1;
		// $i = $i = zeroOneLastShot($game);
		// $i = $i + 1;

		// echo 'Next Shot :' . $i;
		
		if($i > $totalPlayers) {
			return 1;
		}

		return $i;

	} else {
		// No one has shot yet, so set shooting order to 1
		return 1;
	}
}











//
// Individual Player Games
//

	// function zeroOnePlayerLastShot($game) {
		
	// 	$last = DB::table('dartscores')
	// 		->join('users', 'dartscores.user_id', '=', 'users.id')
	// 		->join('dartgame_user', 'dartscores.user_id', '=', 'dartgame_user.user_id')
	// 		->where('game_id', $game->id)
	// 		->latest('dartscores.id')
	// 		->first();
	// 		//dd($last);
		
	// 	if($last){
	// 	// 	// Return last player to shoot
	// 		//echo "LAST : " . $last->user_id . "<br />";
	// 		//dd('last shot:'. $last->shooting_order);
	// 		return $last->shooting_order;
		 	
	// 	}
	// }


	// function zeroOnePlayerNextShot($game) {
	// 	//dd($game->id);
	// 	$totalPlayers = DB::table('dartgame_user')
	// 		->where('dartgame_id', $game->id)
	// 		->where('dartgame_user.shooting_order', zeroOnePlayerLastShot($game))
	// 		->orderBy('shooting_order', 'asc')
	// 		->count();
	// 	 echo '<br />Total Players : ' . ($totalPlayers) . '<br />'; 

	// 	if (zeroOnePlayerLastShot($game)) {
	// 		//dd('PLS is set'.$game->shooting_order);
	// 		echo "LAST SHOT:" . (zeroOnePlayerLastShot($game)) . "<br />";

	// 		$i = zeroOnePlayerLastShot($game) + 1;
	// 		//dd('LAST SHOT:' . $i);
			
	// 		if($i > $totalPlayers) {
	// 			return 1;
	// 		}

	// 		return $i;

	// 	} else {
	// 		// No one has shot yet, so set shooting order to 1
	// 		return 1;
	// 		//echo 'Next Shot::: 1';

	// 	}
	// }





	function zeroOnePlayerScore($game, $player) {
		$t = DB::table('dartscores')
			->join('users', 'dartscores.user_id', '=', 'users.id')
			->join('profiles', 'dartscores.user_id', '=', 'profiles.user_id')
			->where('game_id', $game)
			->where('dartscores.user_id', $player)
			->orderBy('dartscores.id','desc')
			->get();
		//dd($t);
		return $t;
	}