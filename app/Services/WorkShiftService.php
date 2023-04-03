<?php

namespace App\Services;

use App\Models\ShiftUser;
use App\Models\WorkShift;
use Illuminate\Database\Eloquent\Collection;

class WorkShiftService
{
    public function index(): Collection
    {
        return WorkShift::all();
    }

    public function store($request)
    {
        return WorkShift::create([
            'start' => $request['start'],
            'end' => $request['end'],
        ]);
    }

    public function open($id)
    {
        $work_shift = WorkShift::find($id);
        if(!$work_shift) {
            return response()->json([
                'error' => [
                    'code' => 404,
                    'message' => 'Такой смены нет'
                ]
            ], 404);
        }
        if($work_shift->active) {
            return response()->json([
                'error' => [
                    'code' => 404,
                    'message' => 'Forbidden. There are open shifts!'
                ]
            ], 404);
        }
        $work_shift->update([
            'active' => true
        ]);

        return $work_shift;
    }

    public function close($id)
    {
        $work_shift = WorkShift::find($id);
        if(!$work_shift) {
            return response()->json([
                'error' => [
                    'code' => 404,
                    'message' => 'Такой смены нет'
                ]
            ], 404);
        }
        if(!$work_shift->active) {
            return response()->json([
                'error' => [
                    'code' => 404,
                    'message' => 'Forbidden. There are open shifts!'
                ]
            ], 404);
        }
        $work_shift->update([
            'active' => false
        ]);

        return $work_shift;
    }

    public function add($id, $request): void
    {
        ShiftUser::create([
           'user_id' => $request['user_id'],
            'shift_id' => $id
        ]);
    }

}
