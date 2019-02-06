<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DartScore extends Model
{
   protected $table = "dartscores";

   protected $fillable = [
      'user_id',
      'team_id',
      'game_id',
      'score',
      'remaining'
    ];

   public function user()
   {
      return $this->belongsTo('App\User');
   }

   public function team1players()
   {
      return $this->hasMany('App\User');
   }

   public function team2players()
   {
      return $this->hasMany('App\User');
   }
}
