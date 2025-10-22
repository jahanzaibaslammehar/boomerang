<?php

namespace App\Repositories\Admin;

use App\Core\Repositories\AbstractRepository;
use App\Models\User;

class UserRepository extends AbstractRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}