<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $this->authorize('viewAny', Category::class);
        $key = $request->key??'';
        $query = Category::query(true);
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '=', null);
            $query->orWhere('name', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
            // $query->orWhere('email', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
        }
        $Categories = $query->orderBy('id', 'DESC')->where('deleted_at', '=', null)->paginate(5);
        $params = [
            'f_key'          => $key,
            'Categories' =>$Categories
        ];
        // dd($Categories);Category::orderBy('id', 'DESC')->get()
        return view('admin.categories.index', $params);

    }
    public function create()
    {
        $this->authorize('create', Product::class);
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
        $this->authorize('view', Product::class);
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
        $this->authorize('forceDelete', Product::class);
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
        $this->authorize('delete', Product::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        return redirect()->route('categories.index')->with('status', 'thêm thể loại vào thùng rác thành công')
        ;
    }
    public  function trash(){
        $this->authorize('viewtrash', Product::class);
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('admin.categories.trash', $param);
    }
    public function restoredelete($id){
        $this->authorize('restore', Product::class);
        $categories=Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('categories.trash');
    }
}
