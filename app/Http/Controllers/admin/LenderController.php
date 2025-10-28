<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateLenderRequest;
use App\Services\Admin\LenderService;
use Illuminate\Http\Request;

class LenderController extends Controller
{
    public function __construct(private LenderService $service)
    {
        
    }

    public function create(CreateLenderRequest $request)
    {
        $data = $request->validated();
        $lender = $this->service->create($data);

        return response()->json([
            'message' => 'Lender created successfully',
            'data' => $lender
        ], 201);
    }
}
