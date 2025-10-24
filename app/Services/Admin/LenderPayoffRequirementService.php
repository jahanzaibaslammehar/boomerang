<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\LenderPayoffRequirementRepository;

class LenderPayoffRequirementService extends AbstractService
{
    public function __construct(LenderPayoffRequirementRepository $repository)
    {
        $this->repository = $repository;
    }

}