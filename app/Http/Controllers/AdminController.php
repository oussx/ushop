<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Hash;
class AdminController extends Controller
{
    public function __construct(){
		$this->middleware('auth:web');
	}
	
	function admin(){
		$total_products=App\Product::count();
		$total_users=App\User::count();
		$total_orders=App\Order::count();
		$orders=App\Order::with('details')->get();	
	
		return view('admin',compact('total_products','total_users','total_orders','orders'));
	}
	
	function get_add_new_product(){
		$cats=App\Category::all();
		return view('add_new_product',compact('cats'));
	}
	
	function add_new_product(UploadRequest $request){
		$this->validate($request,[
            'name'=>'required|max:255',
			'desc'=>'required',
			'price'=>'required|numeric',
			'quantity'=>'required|numeric',
			]);
			
		$p = new App\Product();
		$p->categories_id =$request->input('cat_id');
		$p->name =  $request->input('name');
		$p->description =  $request->input('desc');
		$p->price = $request->input('price');
		$p->quantity =  $request->input('quantity');
			
		$p->save();
		if(sizeof($request->pics)>0){	
			foreach ($request->pics as $pic) {
				$filename = $pic->store('pics','public');
				App\Image::create([
                'product_id' => $p->id,
                'path' => $filename
				]);
			}	
        }
		return("success");		
	}
	
	function get_update_product(Request $request){
		$cats=App\Category::find($request['cat']);
		$prod=App\Product::find($request['id']);
		return view('add_new_product',compact('cats','prod'));	
	}
	
	function update_product(Request $request){
		$this->validate($request,[
            'name'=>'required|max:255',
			'desc'=>'required',
			'price'=>'required|numeric',
			'quantity'=>'required|numeric',
			]);
		$p=App\Product::find($request->input('id'));
		$p->name =  $request->input('name');
		$p->description =  $request->input('desc');
		$p->price = $request->input('price');
		$p->quantity =  $request->input('quantity');
		$p->save();
		return Redirect::route('admin.dashboard');	
	}
	
	function delete_product(Request $request){
		$p=App\Product::find($request->input('id'));
		$p->delete();
	}
	function get_products(){
		$prods=App\Product::all();
		return view('admin_list_products',compact('prods'));
	}
	
	function get_users(){
		$users=App\User::all();
		return view('admin_list_users',compact('users'));
	}
	
	function get_update_user(Request $request){
		$user=App\User::find($request['id']);
		return view('add_new_user',compact('user'));
		
	}
	
	function update_user(Request $request){
		$p=App\User::find($request->input('id'));
		$p->name =  $request->input('name');
		$p->email =  $request->input('email');
		$p->role = $request->input('role');
		$p->save();
		return Redirect::route('admin.dashboard');	
	}
	
	function delete_user(Request $request){
		$p=App\User::find($request->input('id'));
		$p->delete();
	}
	
	function get_add_new_user(){
		return view('add_new_user');
	}
	
	function add_new_user(Request $request){
		$this->validate($request,[
            'role'=>'required|numeric',
			'name'=>'required',
			'email'=>'required|email',
			'password'=>'required|min:8',
			]);
			
		$u = new App\User();
		$u->role =$request->input('role');
		$u->name =  $request->input('name');
		$u->email =  $request->input('email');
		$u->password = Hash::make($request->input('password'));
		$u->save();
		
		/*if(sizeof($request->pics)>0){	
			foreach ($request->pics as $pic) {
				$filename = $pic->store('profile');
				App\Image::create([
                'user_id' => $u->id,
                'path' => $filename
				]);
			}	
        }*/		
	}
}
