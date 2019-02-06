<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use App\Dart;
use App\DartScore;

class DartsController extends Controller
{

	public function index()
	{
			return view('darts.index');
	}


	public function create()
	{
			$users = User::with('profile')->where('id', '!=', 1)->orderby('username','asc')->get();
			return view('darts.games.create', compact('users'));
	}


	public function store(Request $request)
	{
		$game = new Dart;
			$game->type = $request->type;
			$game->status = 'New';
		$game->save();

		Session::flash('success','The game has been created.');
		return redirect()->route('darts.games.selectTeamsOrPlayers', $game->id);
	}


	public function selectTeamsOrPlayers($game_id)
	{
		$game = Dart::find($game_id);
		return view('darts.games.selectTeamsOrPlayers', compact('game'));
	}


	public function storeTeamsOrPlayers(Request $request)
	{
		$game = Dart::find($request->game_id);
			if($request->t_players) {
				$game->t1_players = $request->t_players;
				$game->t2_players = $request->t_players;
				$game->ind_players = null; 
			}
			if($request->ind_players){
				$game->t1_players = null;
				$game->t2_players = null;
				$game->ind_players = $request->ind_players; 
			}
		$game->save();

		Session::flash('success','The game has been created.');
		if($request->t_players) {
			return redirect()->route('darts.games.selectTeamPlayers', $game->id);
		} else {
			return redirect()->route('darts.games.selectPlayers', $game->id);
		}
	}


	// Select players when team play is selected
	public function selectTeamPlayers($game_id)
	{
		$game = Dart::find($game_id);
		$players = User::with('profile')->where('id', '!=', 1)->orderby('username', 'asc')->get();
		return view('darts.games.selectTeamPlayers', compact('players','game'));
	}


	// Save players when team play is selected
	public function storeTeamPlayers(Request $request)
	{
		$game = Dart::find($request->game_id);

		if (isset($request->team1players))
		{
			$shotOrder = 1;
			foreach($request->team1players as $player)
			{
				DB::insert('insert into dartgame_user (dartgame_id, team_id, user_id, shooting_order) values (?, ?, ?, ?)', [$game->id, 1, $player, $shotOrder]);
				$shotOrder = $shotOrder + 2;
			}
		}

		if (isset($request->team2players))
		{
			$shotOrder = 2;
			foreach($request->team2players as $player)
			{
				DB::insert('insert into dartgame_user (dartgame_id, team_id, user_id, shooting_order) values (?, ?, ?, ?)', [$game->id, 2, $player, $shotOrder]);
				$shotOrder = $shotOrder + 2;
			}

		}

		Session::flash('success','The game has been created.');
		return redirect()->route('darts.games.board');
	}


	// Select individual players when no team play is selected
	public function selectPlayers($game_id)
	{
		$game = Dart::find($game_id);
		$players = User::with('profile')->where('id', '!=', 1)->orderby('username', 'asc')->get();
		return view('darts.games.selectPlayers', compact('players','game'));
	}


	// Save individual players when no team play is selected
	public function storePlayers(Request $request)
	{

		$game = Dart::find($request->game_id);
		$shotOrder = 1;
		foreach($request->players as $player)
		{
			DB::insert('insert into dartgame_user (dartgame_id, user_id, shooting_order) values (?, ?, ?)', [$request->game_id, $player, $shotOrder]);
			$shotOrder = $shotOrder + 1;
		}
		
		Session::flash('success','The game has been created.');
		return redirect()->route('darts.games.board');
	}


	public function show($id)
	{
			//
	}


	public function edit($id)
	{
			//
	}


	public function update(Request $request, $id)
	{
			//
	}


	public function destroy($id)
	{
		// if(!checkACL('manager')) {
		//   return view('errors.403');
		// }

		$game = Dart::find($id);
		$game->delete();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") DELETED category (" . $category->id . ")\r\n", [$category = json_decode($category, true)]);

		Session::flash('success', 'The game and related entries were successfully deleted!');
		return redirect()->route('darts.games.board');
	}


	public function board()
	{
		$games = Dart::orderby('id','desc')->get();
		return view('darts.games.board', compact('games'));
	}


}
