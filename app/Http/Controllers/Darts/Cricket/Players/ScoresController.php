<?php

namespace App\Http\Controllers\Darts\Cricket\Players;

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
      return view('darts.cricket.scores.players.index', compact('game'));
   }

}