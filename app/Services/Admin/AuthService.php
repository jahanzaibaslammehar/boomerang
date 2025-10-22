<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Helpers\ResponseCode;
use App\Http\Resources\admin\UserResource;
use App\Models\User;
use App\Repositories\Admin\UserRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class AuthService extends AbstractService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function login(array $request): UserResource
    {
        $loginService = app(Login::class);
        $user = $loginService->login($request);
        $user = new UserResource($user);

        return $user;
    }

}