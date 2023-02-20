<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        // $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('admin.user.index', $param);
    }
    public function showAdmin()
    {
        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('user.admin', $param);
    }
    public function create()
    {
        $groups = Group::all();
        return view('admin.user.add', compact(['groups']));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images/user', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $user->image = $fileExtension;
        }
        $user->save();

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];


        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $groups=Group::get();
        $param = [
            'user' => $user ,
            'groups' => $groups
        ];
        return view('admin.user.edit', $param);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images/user', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $user->image = $fileExtension;
        }
        $user->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }


    public function destroy($id)
    {
        // $this->authorize('forceDelete', Product::class);


        $user = User::find($id);

        $user->delete();

    }
}
