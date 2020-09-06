<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class search_result extends Controller
{
    function my_search(Request $request){
		
		$search_words=explode(" ",$request->search_text);
			$results=App\Product::where('description','like','%'.$search_words[0].'%')
			->orWhere('name','like','%'.$search_words[0].'%')
			->with('firstImage')->get();
		// $results=App\Product::whereIn('description','like','%'.$request->search_text.'%')
		// ->orWhereIn('name','like','%'.$request->search_text.'%')
		// ->with('firstImage')->get();
		$searched_text=$request->search_text;
		return view('search_results',compact('results','searched_text'));	
	}
}
