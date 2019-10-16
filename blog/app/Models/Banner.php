<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    public function services(){
    	return $this->hasMany('App\Nodels\Service', 'banner_id', 'id');
    }

    public function abouts(){
    	return $this->hasMany('App\Nodels\About', 'banner_id', 'id');
    }

    public function packages(){
    	return $this->hasMany('App\Nodels\Package', 'banner_id', 'id');
    }

    public function partners(){
    	return $this->hasMany('App\Nodels\Partner', 'banner_id', 'id');
    }

}
