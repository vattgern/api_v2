<?php

namespace App\Services;

use App\Models\WorkShift;

class WorkShiftService
{
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
        return $work_shift->update([
            'active' => true
        ]);
    }

}
