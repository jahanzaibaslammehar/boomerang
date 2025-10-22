<?php

namespace App\Repositories\Admin;
use App\Models\LenderFundingRequirement;
use App\Core\Repositories\AbstractRepository;

class LenderFundingRequirementRepository extends AbstractRepository
{
    public function __construct(LenderFundingRequirement $model)
    {
        $this->model = $model;
    }
}