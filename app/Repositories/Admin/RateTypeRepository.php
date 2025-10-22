<?php

namespace App\Repositories\Admin;

use App\Models\RateType;
use App\Core\Repositories\AbstractRepository;

class RateTypeRepository extends AbstractRepository
{
    public function __construct(RateType $model)
    {
        $this->model = $model;
    }
}