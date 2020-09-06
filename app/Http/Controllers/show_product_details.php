<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class show_product_details extends Controller
{	
    function my_product_details($id){
		$prod=App\Product::find($id);
		$images=App\Product::find($id)->images;
		$similar_prod=App\Product::where('description','like','%lorem%')->with('firstImage')->take(4)->get();
		if ($prod != null)   
             return  view('product_desc',compact('prod','images','similar_prod'));
         else
             return redirect('/');
	}
}
