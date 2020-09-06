<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
class Category extends Model
{
    protected $table ='categories';
	
	public function products(){
		return $this->hasMany('App\Product','categories_id','id');
	}
}
