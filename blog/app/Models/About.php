<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
     protected $table ='abouts';

     public function bannes(){
    	return $this->belongsTo('App\Models\Banner', 'packageid', 'id');
    }
}
