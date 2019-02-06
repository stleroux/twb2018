<?php

Route::get('darts', 'DartsController@index')->name('darts.index');

Route::get('darts/games/board', 'DartsController@board')->name('darts.games.board');

Route::get('darts/games/selectTeamsOrPlayers/{gameID}',	'DartsController@selectTeamsOrPlayers')->name('darts.games.selectTeamsOrPlayers');
Route::post('darts/games/storeTeamsOrPlayers',				'DartsController@storeTeamsOrPlayers')->name('darts.games.storeTeamsOrPlayers');

Route::get('darts/games/selectTeamPlayers/{game_ID}',		'DartsController@selectTeamPlayers')		->name('darts.games.selectTeamPlayers');
Route::post('darts/games/storeTeamPlayers',					'DartsController@storeTeamPlayers')			->name('darts.games.storeTeamPlayers');

Route::get('darts/games/selectPlayers/{game_ID}',			'DartsController@selectPlayers')				->name('darts.games.selectPlayers');
Route::post('darts/games/storePlayers',						'DartsController@storePlayers')				->name('darts.games.storePlayers');

Route::get('darts/games/create/',		'Darts\GamesController@create')		->name('darts.game.create');
Route::post('darts/games/',				'Darts\GamesController@store')		->name('darts.games.store');
Route::get('darts/games/{id}/show',		'Darts\GamesController@show')			->name('darts.games.show');
Route::get('darts/games/{key?}',			'Darts\GamesController@index')		->name('darts.games.index');
Route::get('darts/games/{id}/edit',		'Darts\GamesController@edit')			->name('darts.games.edit');
Route::put('darts/games/{id}',			'Darts\GamesController@update')		->name('darts.games.update');
Route::delete('darts/games/{id}',		'Darts\GamesController@destroy')		->name('darts.games.destroy');

Route::get('darts/01/scores/teams/{id}',			'Darts\ZeroOne\Teams\ScoresController@index')		->name('darts.01.scores.teams.index');
Route::post('darts/01/scores/teams/store',		'Darts\ZeroOne\Teams\ScoresController@store')		->name('darts.01.scores.teams.store');

Route::get('darts/01/scores/players/{id}',		'Darts\ZeroOne\Players\ScoresController@index')		->name('darts.01.scores.players.index');
Route::post('darts/01/scores/players/store', 	'Darts\ZeroOne\Players\ScoresController@store')		->name('darts.01.scores.players.store');


Route::get('darts/cricket/scores/teams/{id}',		'Darts\Cricket\Teams\ScoresController@cricketTeamIndex')		->name('darts.cricket.scores.teams.index');
Route::get('darts/cricket/scores/players/{id}', 	'Darts\Cricket\Players\ScoresController@etPlayerIndex')		->name('darts.cricket.scores.players.index');

