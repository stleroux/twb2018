<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use OwenIt\Auditing\Auditable;
//use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Auth;
use Carbon\Carbon;

class Post extends Model // implements AuditableContract
{
	//use Auditable;
	
	// 1 category belongs to many posts
	// a related entry needs to be added to the category model
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}

	// public function comments()
 //   {
 //   	return $this->hasMany('App\Comment')
 //   		//->where('approved','=',1)
 //   		->orderBy('created_at','desc');
 //   }

	public function comments()
	{
		return $this->morphMany('\App\Comment', 'commentable')->orderBy('id','desc');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

   public function scopeNewPosts($query)
   {
      return $query
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         //->where('user_id', '=', Auth::user()->id)
         ->orderBy('title','DESC');
   }

   public function scopePublished($query)
   {
      return $query->where('published_at', '<', Carbon::now());
   }

	// public function modified_by()
	// {
	// 	return $this->belongsTo('App\User');
	// }

	// public function isAdmin() {
	// 	if (Auth::user()->level == 100) {
	// 		return true;
	// 	}
	// }
}