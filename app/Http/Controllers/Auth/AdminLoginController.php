<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin');
	}
    public function showloginForm(){
		return view('auth.admin-login');
	}
	public function login(){
		$this->validate($request,[
			'email' =>'required|email',
			'password' => 'required|min:8'
		]);
		if(Auth::guard('admin')->attempt({})
		Auth::attempt($credentials,$remember)	
		return true;
	}
}
