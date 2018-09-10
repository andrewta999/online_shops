<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;

class CategoryController extends Controller
{
    public function getCate()
    {
    	$data['catelist'] = Category::all();
    	return view('backend.category', $data);
    }
    public function postCate(AddCateRequest $request)
    {
    	$category = new Category();
    	$category->cate_name = $request->input('name');
    	$category->cate_slug = str_slug($request->input('name'));
    	$category->save();
    	return back();
    }

    public function editCate($id)
    {
    	$data['cate'] = Category::find($id);
    	return view('backend.editcategory', $data);
    }
    public function postEditCate(EditCateRequest $request, $id)
    {
    	$category = Category::find($id);
    	$category->cate_name = $request->input('name');
    	$category->cate_slug = str_slug($request->input('slug'));
    	$category->save();
    	return redirect('admin/category');
    }

    public function deleteCate($id)
    {
    	Category::destroy($id);
    	return back();
    }

    public function getProduct($id){
        $data['products'] = Product::where('category', $id)->get();
        $data['cate'] = Category::find($id);
        return view('backend.cateproduct', $data);

    }
}
