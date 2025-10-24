<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\RateTypeRepository;

class RateTypeService extends AbstractService
{
    public function __construct(RateTypeRepository $repository)
    {
        $this->repository = $repository;
    }

}