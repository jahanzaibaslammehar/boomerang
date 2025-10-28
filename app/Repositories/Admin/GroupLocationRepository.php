<?php

namespace App\Repositories\Admin;

use App\Core\Repositories\AbstractRepository;
use App\Models\GroupLocation;

class GroupLocationRepository extends AbstractRepository
{
    public function __construct(GroupLocation $model)
    {
        $this->model = $model;
    }
}