<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    public function checklogin(Request $request)
    {
        // dd(123);
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            return redirect()->route('shop.index');
        } else {
            return redirect()->route('login.index');
        }
    }
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




    public function destroy($id)
    {

    }
    public function checkOuts()
    {
        // dd(2121);
        return view('shop.checkout');
    }
    public function indexlogin()
    {
        return view('loginlogout.login');
    }
    public function register()
    {
        return view('loginlogout.register');
    }
    public function checkregister(Request $request)
    {

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);

        if ($request->password == $request->confirmpassword) {
            $customer->save();
            return redirect()->route('shop.index');
        } else {
            return redirect()->route('shop.index');
        }
    }

    public function order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = '1111';

            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->total = $request->totalAll;
            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();

            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();

            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);

        }

        $notification = [
            'message' => 'success',
        ];
        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        // Mail::send('shop.mail.mail', compact('data'), function ($email) use ($request) {
        // // dd($email);

        //     $email->subject('Moto Shop');
        //     $email->to($request->email, $request->name);
        // });


        return redirect()->route('shop.index')->with($notification);;

    }
    

}
