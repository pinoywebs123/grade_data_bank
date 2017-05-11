<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
    	return view('auth.login');
    }

    public function login_parse(Request $request){
    	$this->validate($request, [
    		'email'=> 'required|email|exists:users',
    		'password' => 'required|max:12'
    	]);
    	$data = $request->only('email', 'password');
    	if(Auth::attempt($data)){
    		if(Auth::user()->role_id == 2){
                return redirect()->route('staff_main');
            }else if(Auth::user()->role_id == 1){
                return redirect()->route('admin_main');
            }
    	}
    	return redirect()->back()->with('info','Invalid Email/Password');

    }
}
