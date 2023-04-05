<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ShiftResource;
use App\Models\Shift;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends ServiceController
{

    /**
     * Display orders in shift.
     */
    public function orders($id): JsonResponse
    {
        $work_shift = $this->service->orders($id);
        if(!$work_shift->first()) {
            return response()->json([
                'code' => 404,
                'message' => 'Такой смены не существует!'
            ], 404);
        }

        return response()->json([
            'data' => ShiftResource::collection($work_shift)
        ]);
    }

    /**
     * Add order in shift.
     */
    public function add_order(OrderRequest $request): JsonResponse
    {
        $work_shift = Shift::find($request['work_shift_id']);
        if(!$work_shift) {
            return response()->json([
                'code' => 404,
                'message' => 'Такой смены не существует!'
            ], 404);
        }
        $workers = $work_shift->users;
        foreach ($workers as $worker) {
            if($worker->role_id != Auth::user()->role_id) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Сотрудника нет в смене!!'
                ], 404);
            }
        }
        $order = $this->service->add_order($request);

        return response()->json([
            'data' => $order,
        ]);
    }
}
