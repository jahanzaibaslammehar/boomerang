<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService as ServicesAbstractService;
use App\Repositories\Admin\GroupLocationRepository;



class GroupLocationService extends ServicesAbstractService
{

    public function __construct(GroupLocationRepository $repository)
    {
        $this->repository = $repository;
    }
}