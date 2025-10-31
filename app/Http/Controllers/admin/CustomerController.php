<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateCustomerRequest;
use App\Services\Admin\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private CustomerService $service)
    {
        
    }

    public function index()
    {
        $customers = $this->service->list();
        return response()->json([
            'message' => 'Customers retrieved successfully',
            'data' => $customers
        ], 200);
    }

    public function store(CreateCustomerRequest $request)
    {
        $customer = $this->service->create($request->validated());
        
        return response()->json([
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);
    }


}
