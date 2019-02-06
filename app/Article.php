<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use OwenIt\Auditing\Auditable;
//use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Auth;
use App\Category;
use Carbon\Carbon;


class Article extends Model
	// implements AuditableContract
{
	use SoftDeletes;
	//use Auditable;

	protected $dates = ['deleted_at', 'published_at'];

	protected $fillable = [
		'title',
		'category_id',
		'published_at',
		'description_eng',
		'description_fre',
		'user_id'
	];


	public function comments()
	{
		return $this->morphMany('\App\Comment', 'commentable')->orderBy('id','desc');
	}
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	// Used to display the Add/Remove links if item is in favorite list
	public function favorites()
	{
		return $this->belongsToMany('App\User')->where('user_id','=',Auth::user()->id);
	}

	public function scopePublished($query)
	{
		return $query->where('published_at', '<', Carbon::now());
	}

	public function scopeMyArticles($query)
	{
		return $query->where('user_id', '=', Auth::user()->id)->orderBy('title','DESC');
	}

	public function scopeUnpublished($query)
	{
		return $query->whereNull('published_at');
	}

	public function scopeFuture($query)
	{
		return $query->where('published_at', '>', Carbon::Now());
	}
	
	public function scopeTrashed($query)
	{
		return $query->whereNotNull('deleted_at')->withTrashed();
	}

	public function scopeTrashedCount($query)
	{
		return $query->whereNotNull('deleted_at')->withTrashed();
	}

   public function scopeNewArticles($query)
   {
      return $query
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         ->orderBy('title','DESC');
   }

	// public function scopeMyFavorites($query)
	// {
	// 	return $query->whereHas('user', function($q) 
	// 	{
	// 		$q->where('user_id', '=', Auth::user()->id);
	// 		dd($q);
	// 	})->get();
	// 	return $query->wherePivot('article_user', Auth::user()->id);
	// }


}
