<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\LenderPayoffDeliveryMethodService;
use Illuminate\Http\Request;

class LenderPayoffDeliveryMethodController extends Controller
{
    public function __construct(private LenderPayoffDeliveryMethodService $service)
    {
        
    }

    public function index()
    {
        $methods = $this->service->list();
        return response()->json($methods);
    }
}
