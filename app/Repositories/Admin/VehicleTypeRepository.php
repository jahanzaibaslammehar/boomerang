<?php

namespace App\Repositories\Admin;

use App\Core\Repositories\AbstractRepository;
use App\Models\VehicleType;

class VehicleTypeRepository extends AbstractRepository
{
    public function __construct(VehicleType $model)
    {
        $this->model = $model;
    }

}
