<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\EditProductRequest;
use DB;
class ProductController extends Controller
{
    public function getProduct()
    {
        $data['productlist'] = DB::table('vp_product')->join('categories', 'vp_product.category', '=', 'categories.id')->orderBy('pro_id', 'desc')->get();
    	return view('backend.product', $data);
    }

    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
    	return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Product();
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->img = $filename;
        $product->accessories = $request->accessories;
        $product->price = $request->price;
        $product->warranty = $request->warranty;
        $product->promotion = $request->promotion;
        $product->condition = $request->condition;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->category = $request->cate;
        $product->featured = $request->featured;
        $product->save();
        $request->img->storeAs('avatar', $filename);
        return redirect('admin/product');
    }

    public function getEditProduct($id)
    {
        $data['productlist'] = Product::find($id);
        $data['catelist'] = Category::all();
    	return view('backend.editproduct', $data);
    }

    public function postEditProduct(EditProductRequest $request, $id)
    {
        $arr['name'] = $request->name;
        $arr['slug'] = str_slug($request->name);
        $arr['accessories'] = $request->accessories;
        $arr['price'] = $request->price;
        $arr['warranty'] = $request->warranty;
        $arr['promotion'] = $request->promotion;
        $arr['condition'] = $request->condition;
        $arr['description'] = $request->description;
        $arr['category'] = $request->cate;
        $arr['featured'] = $request->featured;
        $arr['status'] = $request->status;
        if($request->hasFile('img'))
        {
            $filename = $request->img->getClientOriginalName();
            $arr['img'] = $filename;
            $request->img->storeAs('avatar', $filename);
        }
        Product::where('pro_id', $id)->update($arr);
        return redirect('admin/product');
    }

    public function deleteProduct($id)
    {
        Product::destroy($id);
        return back();
    }
}
