<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function detail($id){
        $cate = Category::find($id);
        $cate->load('products');
        return view('categories.detail', compact('cate'));
    }

    public function remove($id){
        // $category = Category::find($id);
        $products = Product::where('cate_id', $id)->delete();
        // dd($products);
        Category::destroy($id);
        return redirect(route('category.index'));
    }

    public function addForm(){
        return view('categories.add');
    }

    public function saveAdd(Request $request){
        $model = new Category();
        $model->fill($request->all());
        $model->save();
        return redirect(route('category.index'));
    }
    
    public function editForm($id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->back();
        }
        return view('categories.edit', compact('category'));
    }

    public function saveEdit($id, Request $request){
        $model = Category::find($id);
        if(!$model){
            return redirect(route('category.index'));
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('category.index'));
    }
}
