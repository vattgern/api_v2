<?php

namespace App\Http\Controllers\WorkShift;

use App\Http\Requests\WorkShift\WorkShiftRequest;
use App\Http\Resources\WorkShiftResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkShiftController extends ServiceController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function open($id):JsonResponse
    {
        $work_shift = $this->service->open($id);

        return response()->json([
            'data' => $work_shift
        ], 200);
    }
}
