<?php
namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            // $this->authorize('viewAny', Order::class);
            $items=Order::orderBy('id', 'DESC')->paginate(5);
            return view('admin.orders.index',compact('items'));
        }
    }

    public function detail($id)
    {
        // $this->authorize('view', Order::class);
        $items=DB::table('order_details')
        ->join('orders','order_details.order_id','=','orders.id')
        ->join('products','order_details.product_id','=','products.id')
        ->select('products.*', 'order_details.*','orders.id')
        ->where('orders.id','=',$id)->get();
        // dd($items);
        return view('admin.orders.orderdetail',compact('items'));
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
    public function exportOrder(){
        return Excel::download(new OrdersExport, 'order.xlsx');
    }
}
