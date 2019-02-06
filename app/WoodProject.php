<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class WoodProject extends Model
{
   
   protected $table = 'woodprojects';
   protected $dates = ['deleted_at', 'completed_at'];
   protected $fillable = ['name', 'description', 'main_image'];

   public function comments()
   {
      return $this->morphMany('\App\Comment', 'commentable')->orderBy('id','desc');
   }
   
   // A project has many images
   public function projectImages() {
      return $this->hasMany('App\WoodProjectImage');
   }

   public function category() { 
      return $this->belongsTo(Category::class);
   }

   public function woodSpecie () {
      return $this->belongsTo(Category::class);
   }

   public function woodType () {
      return $this->belongsTo(Category::class);
   }

   public function stainType () {
      return $this->belongsTo(Category::class);
   }

   public function stainColor () {
      return $this->belongsTo(Category::class);
   }

   public function stainSheen () {
      return $this->belongsTo(Category::class);
   }

   public function finishType () {
      return $this->belongsTo(Category::class);
   }

   public function finishSheen () {
      return $this->belongsTo(Category::class);
   }

   public function scopeNewWoodProjects($query)
   {
      return $query
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         //->where('user_id', '=', Auth::user()->id)
         ->orderBy('name','DESC');
   }


}
