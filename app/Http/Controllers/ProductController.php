<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Product::class);
        $Product = Product::orderBy('id', 'DESC')->get();
        // dd($Categories);
        return view('admin.product.index', compact('Product'));
    }


    public function create()
    {
        $this->authorize('create', Product::class);
        $category = Category::all();
        return view('admin.product.add', compact(['category']));
    }


    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $get_image = $request->image;
        $path = 'public/assets/product/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $product->image = $new_image;
        // $product->image = $request->image;
        // dd($product);
        $product->save();

        return redirect()->route('product.index');
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $this->authorize('update', Product::class);
        $product = Product::find($id);
        $categories=Category::get();
        $param = [
            'product' => $product ,
            'categories' => $categories
        ];
        return view('admin.product.edit' , $param);

    }


    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);

        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->category_id = $request->category_id;
        $get_image=$request->image;
        if($get_image){
            $path='public/assets/product/'.$products->image;
            if(file_exists($path)){
                unlink($path);
            }
        $path='public/assets/product/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $products->image=$new_image;
        // dd($product);

        $data['product_image']=$new_image;
        }
        $products->save();

        return redirect()->route('product.index');
    }
    public function destroy($id)
    {
        $this->authorize('forceDelete', Product::class);
        $products = Product::onlyTrashed()->findOrFail($id);
        $products->forceDelete();
        return redirect()->back()->with('status', 'Xóa sản phẩm thành công');

    }
    public  function trash(){
        $this->authorize('viewtrash', Product::class);
        $products = Product::onlyTrashed()->get();
        $param = ['products'    => $products];
        return view('admin.product.trash', $param);
    }

    public  function softdeletes($id){
        $this->authorize('delete', Product::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        $product->save();
        return redirect()->route('product.index');
    }

    public function restoredelete($id){
        $this->authorize('restore', Product::class);
        $product=Product::withTrashed()->where('id', $id);
        $product->restore();
        // $notification = [
        //         'message' => 'Khôi phục thành công!',
        //          'alert-type' => 'success'
        //     ];
        // alert()->success('Khôi phục ','thành công');

        return redirect()->route('product.trash')->with('status', 'khôi phục  sản phẩm thành công');
    }
}
