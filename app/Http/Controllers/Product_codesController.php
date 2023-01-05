<?php

namespace App\Http\Controllers;
use App\Models\Product_codes;
use Illuminate\Http\Request;

class Product_codesController extends Controller
{

    public function index()
    {
        $Product_codes = Product_codes::all();
        // dd($Categories);
        return view('admin.categories.index', compact('Categories'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
