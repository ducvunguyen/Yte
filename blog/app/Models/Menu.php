<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
     protected $table ='menus';
      public function bannes(){
    	return $this->belongsTo('App\Models\Banner', 'packageid', 'id');
    }
}
