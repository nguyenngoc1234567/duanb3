<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

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

    public function store(Request $request)
    {

    }

    public function show($id)
    {

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
}
