<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request){
        $pageSize = 5;
        $column_names = [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'star' => "Đánh giá",
            'views' => 'Lượt xem'
        ];
        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần'
        ];

        $keyword = $request->has('keyword') ? $request->keyword : "";
        $cate_id = $request->has('cate_id') ? $request->cate_id : "";
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "id";

        // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
        $query = Product::where('name', 'like', "%$keyword%");
        if($rq_order_by == 'asc'){
            $query->orderBy($rq_column_names);
        }else{
            $query->orderByDesc($rq_column_names);
        }
        if(!empty($cate_id)){
            $query->where('cate_id', $cate_id);
        }
        
        $products = $query->paginate($pageSize);
        $products->load('category', 'orders');

        //Giữ lại các giá trị đang tìm kiếm trong link phân trang
        $products->appends($request->input());

        $categories = Category::all();
        $searchData = compact('keyword', 'cate_id');
        $searchData['order_by'] = $rq_order_by;
        $searchData['column_names'] = $rq_column_names;
        return view('products.index', compact('products', 'categories', 'column_names', 'order_by', 'searchData'));
    }

    // public function apiIndex(Request $request){
    //     $pageSize = 5;
    //     $column_names = [
    //         'name' => 'Tên sản phẩm',
    //         'price' => 'Giá',
    //         'star' => "Đánh giá",
    //         'views' => 'Lượt xem'
    //     ];
    //     $order_by = [
    //         'asc' => 'Tăng dần',
    //         'desc' => 'Giảm dần'
    //     ];

    //     $keyword = $request->has('keyword') ? $request->keyword : "";
    //     $cate_id = $request->has('cate_id') ? $request->cate_id : "";
    //     $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
    //     $rq_column_names = $request->has('column_names') ? $request->column_names : "name";

    //     // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
    //     $query = Product::where('name', 'like', "%$keyword%");
    //     if($rq_order_by == 'asc'){
    //         $query->orderBy($rq_column_names);
    //     }else{
    //         $query->orderByDesc($rq_column_names);
    //     }
    //     if(!empty($cate_id)){
    //         $query->where('cate_id', $cate_id);
    //     }
        
    //     $products = $query->paginate($pageSize);
    //     $products->load('category');

    //     //Giữ lại các giá trị đang tìm kiếm trong link phân trang
    //     $products->appends($request->input());

    //     $categories = Category::all();
    //     $searchData = compact('keyword', 'cate_id');
    //     $searchData['order_by'] = $rq_order_by;
    //     $searchData['column_names'] = $rq_column_names;

    //     return response()->json('products', 'categories', 'column_names', 'order_by', 'searchData');
    //     // return view('products.index', compact('products', 'categories', 'column_names', 'order_by', 'searchData'));
    // }

    public function detail($id){
        $product = Product::find($id);
        $product->load('orders');
        return response()->json($product);
    }

    public function remove($id){
        $model = Product::find($id);
        if(!empty($model->image)){
            $imgPath = str_replace('storage/', 'public/', $model->image);
            Storage::delete($imgPath);
        }
        $model->delete();
        
        return redirect(route('product.index'));
    }

    public function addForm(){
        $categories = Category::all();
        return view('products.add', compact('categories'));
    }

    public function saveAdd(SaveProductRequest $request){
        // tạo SaveProductRequest yêu cầu validate như sau
        // phải điền tên, tên phải là duy nhất trong bảng
        // giá phải điền, giá không được âm
        // ảnh phải điền, phải là định dạng ảnh
        // số lượng phải là số (nếu không điền thì thôi, nếu đã điền thì phải là số dương)
        $model = new Product();
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->image = $imgPath;
        }
        
        $model->fill($request->all());
        $model->save();
        return redirect(route('product.index'));
    }

    public function editForm($id){
        $product = Product::find($id);
        if(!$product){
            return redirect()->back();
        }
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function saveEdit($id, SaveProductRequest $request){
        $model = Product::find($id);
        if(!$model){
            return redirect(route('product.index'));
        }
        if($request->hasFile('image')){
            Storage::delete($model->image);
            
            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->image = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('product.index'));
    }

    public function apiCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'price' => 'required|min:0',
            'quantity' => 'nullable|integer|min:0'
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => 'thêm sản phẩm thành công'
        ]);
    }
}
