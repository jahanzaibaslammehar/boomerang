<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateLocationRequest;
use Illuminate\Http\Request;
use App\Services\Admin\LocationService;

class LocationController extends Controller
{

    public function __construct(private LocationService $service)
    {
    }

    public function index()
    {
        $locations = $this->service->list();
        return response()->json([
            'message' => 'Locations retrieved successfully',
            'data' => $locations
        ], 200);
    }

    public function store(CreateLocationRequest $request)
    {
        $location = $this->service->create($request->validated());
        return response()->json([
            'message' => 'Location created successfully',
            'data' => $location
        ], 201);
        
    }
}
