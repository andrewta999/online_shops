<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
class FrontEndController extends Controller
{
    public function getHome(){
    	$data['featured'] = Product::where('featured', 1)->orderBy('pro_id', 'desc')->take(8)->get();
    	$data['news'] = Product::orderBy('pro_id', 'desc')->take(8)->get();
    	return view('frontend.home', $data);
    }

    public function getDetails($id){
    	$data['item'] = Product::find($id);
    	$data['comment'] = Comment::where('comt_product', $id)->get();
    	return view('frontend.details', $data);
    }

    public function getCategory($id){
    	$data['cate'] = Category::find($id);
    	$data['items'] = Product::where('category', $id)->orderBy('pro_id', 'desc')->paginate(4);
    	return view('frontend.category', $data);
    }

    public function postComment(Request $request, $id){
    	$comt = new Comment();
    	$comt->comt_name = $request->name;
    	$comt->comt_email = $request->email;
    	$comt->comt_comment = $request->content;
    	$comt->comt_product = $id;
    	$comt->save();
    	return back();
    }

    public function getSearch(Request $request){
        $result = $request->text;
        $data['keywords'] = $result;
        $result = str_replace(' ', '%', $result);
        $data['items'] = Product::where('name','like','%'.$result.'%')->paginate(2);
        return view('frontend.search', $data);
    }
}
