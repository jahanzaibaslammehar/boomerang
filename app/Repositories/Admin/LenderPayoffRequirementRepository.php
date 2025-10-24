<?php

namespace App\Repositories\Admin;

use App\Models\RateType;
use App\Core\Repositories\AbstractRepository;
use App\Models\LenderPayoffRequirement;

class LenderPayoffRequirementRepository extends AbstractRepository
{
    public function __construct(LenderPayoffRequirement $model)
    {
        $this->model = $model;
    }
}