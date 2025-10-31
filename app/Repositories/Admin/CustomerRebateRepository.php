<?php

namespace App\Repositories\Admin;

use App\Core\Repositories\AbstractRepository;
use App\Models\CustomerRebate;

class CustomerRebateRepository extends AbstractRepository
{
    public function __construct(CustomerRebate $model)
    {
        $this->model = $model;
    }

}