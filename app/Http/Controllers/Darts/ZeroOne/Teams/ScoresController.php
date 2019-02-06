<?php

namespace App\Http\Controllers\Darts\ZeroOne\Teams;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Dart;
use App\DartScore;
use App\User;


class ScoresController extends Controller
{

   public function index($gameID)
   {
      $game = Dart::find($gameID);
      return view('darts.01.scores.teams.index', compact('game'));
   }


##################################################################################################################
# ███████╗████████╗ ██████╗ ██████╗ ███████╗
# ██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝
# ███████╗   ██║   ██║   ██║██████╔╝█████╗  
# ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝  
# ███████║   ██║   ╚██████╔╝██║  ██║███████╗
# ╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝
##################################################################################################################
   public function store(Request $request)
   {
      // if(!checkACL('manager')) {
      //   return view('errors.403');
      // }

      $this->validate($request, [
         'game_id' => 'required',
         'team_id' => 'required',
         'user_id' => 'required',
         'score1' => 'sometimes|required|integer|max:180',
         'score2' => 'sometimes|required|integer|max:180'
      ],
      [
         'user_id.required' => 'Please select a player.',
         'score1.required' => 'Please enter a score.',
         'score1.integer' => 'Score must be a number.',
         'score1.max' => 'Score must be less than 181.',
         'score2.required' => 'Please enter a score.',
         'score2.integer' => 'Score must be a number.',
         'score2.max' => 'Score must be less than 181.',
      ]);

      // Determine which score box has data
      if($request->score1) {
         $whichScore = $request->score1;
      }else{
         $whichScore = $request->score2;
      }

      // Is the entered score less than 0?
      if($whichScore < 0){
         Session::flash('error','Invalid Score! You need to enter a score above 0. Please try again.');
         return redirect()->route('darts.01.scoers.teams.index', $request->game_id);
      }

      // Is the entered score greater than 180?
      if($whichScore > 180){
         Session::flash('error','Invalid Score! Total score cannot exceed 180. Please try again.');
         return redirect()->route('darts.01.scores.teams.index', $request->game_id);
      }

      // Would the entered score leave 1 remaining which is not possible
      if($request->remainingScore - $whichScore == 1){
         $score = new DartScore;
            $score->user_id = $request->user_id;
            $score->team_id = $request->team_id;
            $score->game_id = $request->game_id;
            $score->score = 0;
            $score->remaining = $request->remainingScore;
         $score->save();

         Session::flash('error','This score cannot be registered as it would leave an impossibility to finish with a Double Out. A value of 0 will be added to the scoresheet.');
         return redirect()->route('darts.01.scores.teams.index', $request->game_id);
      }

      // Is the entered score greater than the remaining score?
      if($whichScore > $request->remainingScore){
         $score = new DartScore;
            $score->user_id = $request->user_id;
            $score->team_id = $request->team_id;
            $score->game_id = $request->game_id;
            $score->score = 0;
            $score->remaining = $request->remainingScore;
         $score->save();

         Session::flash('error','The registered score is higher than the required score to finish. A value of 0 will be added to the scoresheet.');
         return redirect()->route('darts.01.scores.teams.index', $request->game_id);
      }

      // All checks passed, enter the score in the DB
      $score = new DartScore;
         $score->user_id = $request->user_id;
         $score->team_id = $request->team_id;
         $score->game_id = $request->game_id;
         $score->score = $whichScore;
         $score->remaining = $request->remainingScore - $whichScore;
      $score->save();

      // Change the game status to In Progress 
      $game = Dart::find($request->game_id);
         $game->status = 'In Progress';
      $game->save();

      if(zeroOneGameWinner($game) == true) {
         $game = Dart::find($request->game_id);
            $game->status = 'Completed';
         $game->save();
         echo 'Qwerty';
      }


      // Save entry to log file using built-in Monolog
      //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") CREATED category (" . $category->id . ")\r\n", [$category = json_decode($category, true)]);

      Session::flash('success','The scoresheet has been updated.');
      return redirect()->route('darts.01.scores.teams.index', $request->game_id);
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
      //
   }



}
