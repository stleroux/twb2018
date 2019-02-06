<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Profile;
use Auth;

class User extends Authenticatable
{
	use Notifiable;
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'email', 'publicEmail', 'password',
	];

	protected $dates = ['last_login_date'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	* Always capitalize the first name when we retrieve it
	*/
	public function getFirstNameAttribute($value) {
		return ucfirst($value);
	}

	/**
	 * Always capitalize the last name when we retrieve it
	 */
	public function getLastNameAttribute($value) {
		return ucfirst($value);
	}

	/**
	* Always capitalize the first letter of the username when we retrieve it
	*/
	public function getUsernameAttribute($value) {
		return ucfirst($value);
	}
	
	public function profile()
	{
		return $this->hasOne('App\Profile')->withTrashed();
	}

	public function role()
	{
		return $this->belongsTo('App\Role')->orderBy('name', 'asc');
	}

	public function recipes()
	{
		return $this->belongsToMany('App\Recipe');
	}

   public function dartScores()
   {
      return $this->belongsToMany('App\DartScore');
   }

   public function dartgames()
   {
      return $this->belongsToMany('App\DartGame');
   }

   public function scopeTrashed($query)
   {
      return $query->where('deleted_at', '!=', NULL)->withTrashed();
   }

   public function scopeNewUsers($query)
   {
      return $query
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         //->where('user_id', '=', Auth::user()->id)
         ->orderBy('username','DESC');
   }

   public function scopeInactiveUsers($query)
   {
      return $query
         ->where('login_count', '=' , 0)
         //->where('user_id', '=', Auth::user()->id)
         ->orderBy('username','DESC');
   }


}
