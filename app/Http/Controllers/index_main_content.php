<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app;
class index_main_content extends Controller
{
    function my_read_all(){
		$data=App\Product::all();
		return view('index',compact('data'));
	}
}
