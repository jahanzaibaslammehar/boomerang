<?php

namespace App\Repositories\Admin;

use App\Models\RateType;
use App\Core\Repositories\AbstractRepository;
use App\Models\LenderPayoffDeliveryMethods;

class LenderPayoffDeliveryMethodRepository extends AbstractRepository
{
    public function __construct(LenderPayoffDeliveryMethods $model)
    {
        $this->model = $model;
    }
}