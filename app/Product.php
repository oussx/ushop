<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
class Product extends Model
{
    //
	protected $table ='product';
	public $timestamps = false;
	 public function firstimage()
    {
        return $this->hasOne('\App\Image','product_id','id');
    }
	public function images(){
		return $this->hasMany('App\Image','product_id','id');
	}
	
	public function product_category(){
		return $this->belongsTo('App\Category','categories_id','id');
	}
}
