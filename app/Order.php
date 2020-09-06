<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $table ='orders';
   
   public function details(){
		return $this->hasMany('App\OrderDetails','order_id','id');
	}
}
