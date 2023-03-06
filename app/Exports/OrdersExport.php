<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select(
                'customers.name',
                'customers.email',
                'customers.phone',
                'customers.address',
                'orders.date_at',
            )->get();
    }
    public function headings(): array
    {
        return ["Tên Khách Hàng", " Email", "Điện Thoại","Địa chỉ","Ngày Đặt"];
    }
}
