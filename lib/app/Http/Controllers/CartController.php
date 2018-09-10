<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart, Mail;
use App\Models\Product;

class CartController extends Controller
{
    public function getAddCart($id)
    {
    	$product = Product::find($id);
    	Cart::add(['id'=>$id, 'name'=>$product->name, 'qty'=>1, 'price'=>$product->price, 'options'=>['img'=>$product->img]]);
    	return redirect('cart/show');
    }

    public function showCart()
    {
    	$data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view('frontend.cart', $data);
    }

    public function deleteCart($id)
    {
    	if($id == 'all'){
    		Cart::destroy();
    	}else{
    		Cart::remove($id);
    	}
    	return back();
    }

    public function updateCart(Request $request){
    	Cart::update($request->rowId, $request->qty);
    }

    public function complete(Request $request){
        $data['info'] = $request->all();
        $email = $request->email;
        $data['total'] = Cart::total();
        $data['cart'] = Cart::content();
        Mail::send('frontend.email', $data, function($message) use($email){
            $message->from('admin@gmail.com', 'Admin');
            $message->to($email, $email);
            $message->subject('Purchase confirmation');
        });

        return redirect('complete');
    }

    public function getcomplete(){
        return view('frontend.complete');
    }
}
