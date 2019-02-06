<?php
 
namespace App\Classes;

class ZeroOneDarts {

   function playerBestScore($player) {
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

}