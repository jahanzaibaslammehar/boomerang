<?php

namespace App\Repositories\Admin;

use App\Models\RateType;
use App\Core\Repositories\AbstractRepository;
use App\Models\Lender;

class LenderRepository extends AbstractRepository
{
    public function __construct(Lender $model)
    {
        $this->model = $model;
    }
}