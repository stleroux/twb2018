<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WoodProjectImage extends Model
{
   protected $table = 'image_woodproject';
   
   protected $fillable = ['project_id', 'description', 'image', 'title', 'size'];

   // An ImageProject belongs to a Project
   public function woodProject() {
      return $this->belongsTo('App\WoodProject');
   }
}