<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Items;
use App\Models\News;
use Session, DB;

class AccountController extends Controller
{
    public function getAccount(){
    	return view('frontend.account');
    }

    public function postAccount(Request $request){
    	$filename = $request->img;
    	$account = new Account();
    	$account->email = $request->mail;
    	$account->password = $request->password;
    	$account->phone = $request->phone;
    	$account->img = $filename;
    	$account->save();
        $request->file('img')->store('profile');
    	return redirect('accountLogin');
    }

    public function getLogin(){
    	return view('frontend.login');
    }

    public function postLogin(Request $request){
    	$arr = ['email'=>$request->mail, 'password'=>$request->password];
    	$count = Account::where($arr)->get()->count();
    	$profile = Account::where($arr)->get()->toArray();
    	if($count > 0)
    	{
    		Session::put('email', $request->mail);
    		return redirect('mystore/'.$profile[0]['acc_id']);
    	}else{
    		return back();
    	}
    }

    public function getMyStore($id){
    	$data['items'] = Items::where('p_id', $id)->get();
    	return view('frontend.mystore', $data);
    }

    public function getMyStore2($email){
        $id = Account::where('email', $email)->get()->toArray();
        $id1 = $id[0]['acc_id'];
        $data['items'] = Items::where('p_id', $id1)->get();
        return view('frontend.mystore', $data);
    }

    public function postMystore(Request $request, $id){
    	$filename = $request->img->getClientOriginalName();
    	$item = new Items();
    	$item->name = $request->name;
    	$item->detail = $request->detail;
    	$item->img = $filename;
    	$item->p_id = $id;
    	$item->price = $request->price;
    	$item->save();
        $request->img->storeAs('products', $filename);
    	return back();
    }

    public function logout(){
    	Session::flush();
    	return redirect('/');
    }

    public function getStores(){
    	$data['owners'] = Account::all();
    	$data['products'] = Items::all();
    	return view('frontend.stores', $data);
    }

    public function news(){
    	$data['news'] = News::all();
    	return view('frontend.news', $data);
    }

    public function post(Request $request){
    	$news = new News();
    	$news->name = $request->name;
    	$news->title = $request->title;
    	$news->detail = $request->detail;
    	$news->source = $request->source;
    	$news->save();
    	return back();
    }

}
