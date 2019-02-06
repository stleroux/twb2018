<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dart extends Model
{
   protected $table = "dartgames";

   protected $fillable = [
      'type',
      't1_players',
      't2_players',
      'ind_players',
      'status'      
   ];

   // protected $casts = [
   //    'team1players' => 'array',
   //    'team2players' => 'array'
   // ];

   // public function team1players()
   // {
   //    return $this->hasMany('App\User');
   // }

   // public function team2players()
   // {
   //    return $this->hasMany('App\User');
   // }

   public function users()
   {
      return $this->belongsToMany('App\User');
   }
}
