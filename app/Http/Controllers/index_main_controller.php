<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
class index_main_controller extends Controller
{
	function my_read_all(){
		$data=App\Product::with('images')->get();
		$hot_deals=App\Product::with('firstimage')->get();
		return view('index',compact('data','hot_deals'));
	}
}