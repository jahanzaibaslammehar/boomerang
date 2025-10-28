<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\LenderFundingRequirementService;
use Illuminate\Http\Request;

class LenderFundingRequirementController extends Controller
{

    public function __construct(private LenderFundingRequirementService $service)
    {

    }
    public function index()
    {
        $requirements = $this->service->list();
        return response()->json($requirements);
    }
}
