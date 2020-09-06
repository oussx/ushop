<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table ='images';
	protected $fillable = ['product_id', 'path'];
	public $timestamps = false;
	public function product_images(){
		return $this->belongsTo('App\Product','product_id','id');
	}
}
