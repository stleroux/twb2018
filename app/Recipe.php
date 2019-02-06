<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\Category;
//use App\Recipe;
use Carbon\Carbon;

class Recipe extends Model
{

   use SoftDeletes;

   protected $dates = ['deleted_at', 'published_at'];

   // protected $fillable = [
   //    'title',
   //    'ingredients',
   //    'methodology',
   //    'image',
   //    'category_id',
   //    'servings',
   //    'prep_time',
   //    'cook_time',
   //    'personal',
   //    'views',
   //    'source',
   //    'author_notes',
   //    'publis_notes',
   //    'user_id',
   //    'modified_by_id',
   //    'last_viewed_by_id',
   //    'published_at',
   //    'last_viewd_on'      
   // ];

   public function comments()
   {
      return $this->morphMany('\App\Comment', 'commentable')->orderBy('id','desc');
   }
   
	public function user()
   {
      return $this->belongsTo('App\User');
   }

   public function modifiedBy()
   {
      return $this->belongsTo('App\User');
   }

   public function lastViewedBy()
   {
      return $this->belongsTo('App\User');
   }

   public function category()
   {
      return $this->belongsTo('App\Category');
   }

   // used in the add and remove favorite
   public function favorites()
   {
      return $this->belongsToMany('App\User')->where('user_id','=',Auth::user()->id);
      // return $this->belongsToMany('App\User');
   }

   public function scopePublished($query)
   {
      return $query->where('published_at', '<', Carbon::now());
   }
   
   public function scopeUnpublished($query)
   {
      return $query
         ->where('published_at', '=', NULL);
   }

   public function scopeTrashed($query)
   {
      return $query->where('deleted_at', '!=', NULL)->withTrashed();
   }

   public function scopeTrashedCount($query)
   {
      return $query->whereNotNull('deleted_at')->withTrashed();
   }
   
   public function scopeMyRecipes($query)
   {
      return $query
         ->where('user_id', '=', Auth::user()->id)
         ->orderBy('title','DESC');
   }

   public function scopeNewRecipes($query)
   {
      return $query
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         //->where('user_id', '=', Auth::user()->id)
         ->orderBy('title','DESC');
   }

   public function scopeFuture($query)
   {
      return $query
         ->where('published_at', '>', Carbon::Now());
   }
   
}
