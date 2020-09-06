<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use Carbon;
class CartController extends Controller
{
    function index(Request $request){
		//dd($request->session());
		$prods=null;
		$total=0;
		 if ($request->session()->exists('prod')) {
			//$prods=array('k'=>'dldhj');
			 $prods=$request->session()->get('prod');
			 $arr=array_column($prods,'id');
			 
			 if (!in_array($request->id, $arr)){
				 $prods[$request->id]['id']=$request->id;
				 $prods[$request->id]['name']=$request->name;
				 $prods[$request->id]['price']=$request->price;
				 $prods[$request->id]['qty']=$request->qty;
			 }else{
				 $prods[$request->id]['qty']+=1;
				 $prods[$request->id]['price']=$request->price*$prods[$request->id]['qty'];
			 }
			
				
		}else{
			 $prods	=array(
				 $request->id=>array(
											 'id'=>$request->id,
											 'name'=>$request->name,
											 'price'=>$request->price*$request->qty,
											 'qty'=>$request->qty
											 )
			 );
			
		}
		$request->session()->put('prod', $prods);
		return ("success" . $request->id);
		 // return view("cart",compact('prods'));
	}
	
	function show(Request $request ){
		 // $arr=$request->session()->get('prod');
		 // if(!in_array(4,$arr))
			 // echo 'yes';
		 // dd($arr);	
		//dd($arr=array_column($request->session()->get('prod'),'id'));
	
		if ($request->session()->exists('prod')) {
			$prods=$request->session()->get('prod');
			return view("cart",compact('prods'));
		}else{
			return view("cart");
		}
		
	}
	
	function empty_cart(Request $request ){
		if ($request->session()->exists('prod')) {
			$request->session()->forget('prod');	
			return("success");
		}
	}
	
	function show_cart_summary(Request $request ){
		if ($request->session()->exists('prod')) {
			$prods=$request->session()->get('prod');
			return view("cart_summary",compact('prods'));
			
		}		
	}
	function show_order_page(Request $request ){
		if ($request->session()->exists('prod')) {
			$prods=$request->session()->get('prod');
			return view("order_page",compact('prods'));	
		}
			
	}
	
	function complete_order(Request $request ){
		$total=0;
		
		$this->validate($request,[
            'name'=>'required|max:255',
			'city'=>'required',
			'address'=>'required',
			'ccard'=>'required|numeric',
			]);
		if ($request->session()->exists('prod')) {
			$prods=$request->session()->get('prod');
				$order = new App\Order();
				$order->name =  $request->input('name');
				$order->city =  $request->input('city');
				$order->address = $request->input('address');
				$order->users_id = Auth::id();
				$order->status = 1;
				$order->shipping_id = 1;
				$order->date_shipped=Carbon\Carbon::now()->format('Y-m-d');
				$order->save();
				foreach($prods as $prod){
					$details = new App\OrderDetails();
					$details->order_id=	$order->id;
					$details->product_id=$prod['id'];
					$details->quantity=$prod['qty'];
					$details->price=$prod['price'];
					$details->save();
				}
				$card = App\CreditCard::updateOrCreate(
					['card_number' => $request->input('ccard')], ['users_id' => Auth::id()]
				);
			dd("success");	
		}
			
	}
}
