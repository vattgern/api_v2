<?php

namespace App\Http\Controllers\WorkShift;

use App\Http\Requests\WorkShift\addUserRequest;
use App\Http\Requests\WorkShift\WorkShiftRequest;
use App\Http\Resources\WorkShiftResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class WorkShiftController extends ServiceController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $work_shifts = $this->service->index();

        return response()->json([
            'data' => WorkShiftResource::collection($work_shifts),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkShiftRequest $request):JsonResponse
    {
        $work_shift = $this->service->store($request);

        return response()->json([
            'id' => $work_shift->id,
            'start' => $work_shift->start,
            'end' => $work_shift->end,
        ], 201);
    }

    /**
     * Open shift.
     */
    public function open($id):JsonResponse
    {
        $work_shift = $this->service->open($id);

        return response()->json([
            'data' => $work_shift
        ]);
    }

    /**
     * Close shift.
     */
    public function close($id):JsonResponse
    {
        $work_shift = $this->service->close($id);

        return response()->json([
            'data' => $work_shift
        ]);
    }

    /**
     * Add user to shift.
     */
    public function add($id, addUserRequest $request):JsonResponse
    {
        $user = User::find($request['user_id']);
        if (!$user) {
            return response()->json([
                'error' => [
                    'code' => 404,
                    'message' => 'Такого пользователя не существует!'
                ]
            ], 404);
        }

        $this->service->add($id, $request);

        return response()->json([
            'id_user' => $request['user_id'],
            'status' => 'added'
        ]);
    }
}
