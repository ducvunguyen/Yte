<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
     protected $table ='partners';

      public function bannes(){
    	return $this->belongsTo('App\Models\Banner', 'packageid', 'id');
    }
}
