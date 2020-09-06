<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
	protected $table ='credit_cards';
	protected $fillable = ['card_number', 'users_id'];
    public function user(){
		return $this->belongsTo('App\User','users_id','id');
	}
}
