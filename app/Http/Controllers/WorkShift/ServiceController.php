<?php

namespace App\Http\Controllers\WorkShift;

use App\Http\Controllers\Controller;
use App\Services\WorkShiftService;

class ServiceController extends Controller
{
    public WorkShiftService $service;

    public function __construct(WorkShiftService $service){
        $this->service = $service;
    }
}
