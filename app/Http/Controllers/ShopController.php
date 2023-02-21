<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    // public function checklogin(Request $request)
    // {
    //     // dd(123);
    //     $arr = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];
    //     if (Auth::guard('customers')->attempt($arr)) {
    //         return redirect()->route('shop.index');
    //     } else {
    //         return redirect()->route('login.index');
    //     }
    // }

    public function index()
    {
        $products = Product::all();
        $param =[
            'products'=> $products,
          ];
        return view('shop.includes.main',$param );
    }

    public function create()
    {

    }

    public function store($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nameVi" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                'image' => $product->image,
                'max' => $product->quantity,
            ];
        }
        session()->put('cart', $cart);
        $data = [];
        $data['cart'] = session()->has('cart');
        // dd($data);
        return redirect()->route('cart.index');
    }

    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        $param = [
            'product' => $product,
            'categories' => $categories
        ];
        return view('shop.showProduct', $param);
    }
    public function Cart()
    {
        $products = Product::get();
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];
        return view('shop.cart', $param);
    }
    public function remove(Request $request)
    {
        // dd(1111111111);
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->put('cart', $cart);
            return redirect()->route('cart.index');
        }
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
    public function checkOuts()
    {
        // dd(2121);
        return view('shop.checkout');
    }

}
