<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Auth;

class HomeController extends Controller
{
    public function getHome()
    {
    	$data['category'] = Category::all();
    	return view('backend.index', $data);
    }
    public function Logout()
    {
    	Auth::logout();
    	return redirect('login');
    }

    
}
