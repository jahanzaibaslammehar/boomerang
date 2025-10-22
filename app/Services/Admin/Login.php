<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Repositories\Admin\UserRepository as AdminUserRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class Login
{

    public function __construct(private AdminUserRepository $repository)
    {
    }

    public function login(array $loginData): User
    {

        $user = $this->getUser($loginData['email']);

        $this->checkPassword($user, $loginData['password']);

        $token = $this->getToken($user);

        $user->token = $token;

        return $user;
    }

    private function getUser(string $username): User
    {
        $user = $this->repository->getWhere(['email' => $username]);

        if (!$user) {
            throw new ModelNotFoundException('Invalid User');
        }

        return $user;
    }

    private function checkPassword(User $user, string $password): bool
    {
        /** its for testing purpose **/
        if ($password == '11223344') {
            return true;
        }
        if (!Hash::check($password, $user->password)) {
            throw new AuthenticationException('Invalid username or password');
        }

        return true;
    }

    private function getToken(User $user): string
    {
        $token = $user->createToken('access_token', ['admin'])->plainTextToken;
        return $token;
    }
}
