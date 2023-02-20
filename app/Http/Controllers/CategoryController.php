<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $Categories = Category::all();
        // dd($Categories);
        return view('admin.categories.index', compact('Categories'));

    }


    public function create()
    {
        // dd(1);
        return view('admin.categories.add');
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact(['category']));

    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->back()->with('status', 'Xóa sản phẩm thành công');

    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('category.index');
        }
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
    public  function softdeletes($id){
        // $this->authorize('delete', Category::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        return redirect()->route('categories.index')->with('status', 'Khôi phụ sản phẩm thành công')
        ;
    }
    public  function trash(){
        // $this->authorize('viewtrash', Category::class);
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('admin.categories.trash', $param);
    }
    public function restoredelete($id){

        $categories=Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('categories.trash');
    }
}
