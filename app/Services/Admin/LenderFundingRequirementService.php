<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\LenderFundingRequirementRepository;

class LenderFundingRequirementService extends AbstractService
{
    public function __construct(LenderFundingRequirementRepository $repository)
    {
        $this->repository = $repository;
    }

}