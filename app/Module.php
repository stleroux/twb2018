<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use OwenIt\Auditing\Auditable;
//use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Auth;

class Module extends Model //implements AuditableContract
{
	//use Auditable;
	
	/**
	* Always capitalize the first name when we retrieve it
	*/
	public function getNameAttribute($value) {
		return ucfirst($value);
	}

   public function scopeNewModules($query)
   {
      return $query
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         //->where('user_id', '=', Auth::user()->id)
         ->orderBy('name','DESC');
   }

}
