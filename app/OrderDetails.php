<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table ='orderdetails';
	
	public function products(){
		return $this->hasMany('App\Product','product_id','id');
	}
	
	public function order(){
		return $this->belongsTo('App\Order','order_id','id');
	}
	
	
	
}
