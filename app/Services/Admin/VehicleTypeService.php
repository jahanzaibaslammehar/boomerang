<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\VehicleTypeRepository;

class VehicleTypeService extends AbstractService
{
    public function __construct(VehicleTypeRepository $repository)
    {
        $this->repository = $repository;
    }

}