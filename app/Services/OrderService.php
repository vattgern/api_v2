<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderShift;
use App\Models\Shift;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    public function orders($id): Collection
    {
        return Shift::where('id', $id)->get();
    }

    public function add_order($request)
    {
        $order = Order::create([
            'table' => $request['table_id'],
            'number_of_person' => $request['number_of_person'],
            'status' => 'Принят',
            'price' => 0
        ]);
        OrderShift::create([
            'order_id' => $order->id,
            'shift_id' => $request['work_shift_id']
        ]);

        return $order;
    }
}
