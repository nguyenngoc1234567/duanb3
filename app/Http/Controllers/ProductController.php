<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $product->category_id = $request->category_id;
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
        $products->save();

        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();


        return redirect()->route('product.index');
    }
}
