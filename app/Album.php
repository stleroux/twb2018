<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Album extends Model
{
	protected $fillable = ['name', 'description', 'cover_image'];

	// An album has many photos
	public function photos() {
		return $this->hasMany('App\Photo');
	}

   public function scopeNewAlbums($query)
   {
      return $query
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         //->where('user_id', '=', Auth::user()->id)
         ->orderBy('name','DESC');
   }

}
