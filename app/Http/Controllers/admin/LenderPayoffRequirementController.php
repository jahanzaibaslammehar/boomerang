<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\LenderPayoffRequirementService;
use Illuminate\Http\Request;

class LenderPayoffRequirementController extends Controller
{
    public function __construct(private LenderPayoffRequirementService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $requirements = $this->service->list();
        return response()->json($requirements);
    }
}
