<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\LocationRepository;

class LocationService extends AbstractService
{
    public function __construct(LocationRepository $repository)
    {
        $this->repository = $repository;
    }
}