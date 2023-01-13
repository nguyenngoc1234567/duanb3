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
        $Product = Product::all();
        // dd($Categories);
        return view('admin.product.index', compact('Product'));
    }


    public function create()
    {
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
        //
    }


    public function edit($id)
    {
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
        $products->category_id = $request->category_id;
        $get_image=$request->image;
        if($get_image){
            $path='public/uploads/product/'.$products->image;
            if(file_exists($path)){
                unlink($path);
            }
        $path='public/uploads/product/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $products->image=$new_image;
        // dd($product);

        $data['product_image']=$new_image;
        }
        $products->save();

        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();


        return redirect()->route('product.index');
    }
}
