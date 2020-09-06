<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class show_category_products extends Controller
{
     function my_category_details($id){
		$products=App\Product::where('categories_id',$id)->with('firstImage')->get();
		
		$data=App\Product::with('images')->get();
		$hot_deals=App\Product::with('firstimage')->get();
		
		if ($products != null)   
             return  view('category_products',compact('products','hot_deals'));
         else
             return redirect('/');
	}
}
