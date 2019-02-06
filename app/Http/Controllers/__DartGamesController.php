<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\DartGame;
use App\DartScore;
use App\User;
use Illuminate\Http\Request;

class DartGamesController extends Controller
{

	 /**
	  * Display a listing of the resource.
	  *
	  * @return \Illuminate\Http\Response
	  */
	 // public function index()
	 // {
		//   $games = Dartgame::orderby('id','desc')->get();
		//   return view('darts.games.01.index', compact('games'));
	 // }

	 /**
	  * Show the form for creating a new resource.
	  *
	  * @return \Illuminate\Http\Response
	  */
	 public function create()
	 {
		  $users = User::with('profile')->where('id', '!=', 1)->orderby('username','asc')->get();
		  return view('darts.games.01.create', compact('users'));
	 }

	 /**
	  * Store a newly created resource in storage.
	  *
	  * @param  \Illuminate\Http\Request  $request
	  * @return \Illuminate\Http\Response
	  */
	 public function store(Request $request)
	 {
		  $game = new DartGame;
				$game->type = $request->type;
				$game->t1_players = $request->t1_players;
				$game->t2_players = $request->t2_players;
				$game->status = 'New';
				//dd($game);
		  $game->save();

		  Session::flash('success','The game has been created.');
		  return redirect()->route('dartgames.01.selectPlayers', $game->id);
	 }


	 public function selectPlayers($game_id)
	 {
		  // $gameID = $game_id;
		  //dd($gameID);
		  $game = DartGame::find($game_id);
		  $players = User::with('profile')->where('id', '!=', 1)->orderby('username', 'asc')->get();
		  return view('darts.games.01.selectPlayers', compact('players','game'));
	 }


	 public function storePlayers(Request $request)
	 {
		  //dd($request);
		  $game = DartGame::find($request->game_id);
		  //dd($game);
		  if (isset($request->team1players))
		  {
				foreach($request->team1players as $player)
				{
					 DB::insert('insert into dartgame_user (dartgame_id, team_id, user_id) values (?, ?, ?)', [$game->id, 1, $player]);
				}
		  }

		  if (isset($request->team2players))
		  {
				foreach($request->team2players as $player)
				{
					 DB::insert('insert into dartgame_user (dartgame_id, team_id, user_id) values (?, ?, ?)', [$game->id, 2, $player]);
				}
		  }

		  Session::flash('success','The game has been created.');
		  return redirect()->route('dartgames.01.index');

	 }


	 /**
	  * Display the specified resource.
	  *
	  * @param  int  $id
	  * @return \Illuminate\Http\Response
	  */
	 public function show($id)
	 {
		  //
	 }

	 /**
	  * Show the form for editing the specified resource.
	  *
	  * @param  int  $id
	  * @return \Illuminate\Http\Response
	  */
	 public function edit($id)
	 {
		  //
	 }

	 /**
	  * Update the specified resource in storage.
	  *
	  * @param  \Illuminate\Http\Request  $request
	  * @param  int  $id
	  * @return \Illuminate\Http\Response
	  */
	 public function update(Request $request, $id)
	 {
		  //
	 }

	 /**
	  * Remove the specified resource from storage.
	  *
	  * @param  int  $id
	  * @return \Illuminate\Http\Response
	  */
	 public function destroy($id)
	 {
		// if(!checkACL('manager')) {
		//   return view('errors.403');
		// }

		$game = DartGame::find($id);
		$game->delete();

		// Save entry to log file using built-in Monolog
		//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") DELETED category (" . $category->id . ")\r\n", [$category = json_decode($category, true)]);

		Session::flash('success', 'The game and related entries were successfully deleted!');
		return redirect()->route('dartgames.01.index');
	 }
}
