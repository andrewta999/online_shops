<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('backend.login');
    }

    public function postLogin(LoginRequest $request){
    	$arr = ['email'=>$request->input('email'), 'password'=>$request->input('password')];
    	if($request->input('remember') == "Remember Me")
    	{
    		$remember = true;
    	}else{
    		$remember = false;
    	}
    	if(Auth::attempt($arr, $remember))
    	{ 
    		return redirect('admin/home');	
    	}else{
    		return view('backend.login',['fail'=>'Tai khoan khong ton tai']);
    	}
    }
}
