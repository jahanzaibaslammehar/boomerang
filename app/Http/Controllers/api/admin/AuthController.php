<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminLoginRequest;
use App\Services\Admin\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $service)
    {
        
    }
    public function login(AdminLoginRequest $request)
    {
        // Dummy login logic for demonstration
        $response = $this->service->login($request->validated());

        return response()->json([
            'message' => 'Login successful',
            'data' => $response
        ]);

    }
}
