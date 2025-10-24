<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\LenderPayoffDeliveryMethodRepository;

class LenderPayoffDeliveryMethodService extends AbstractService
{
    public function __construct(LenderPayoffDeliveryMethodRepository $repository)
    {
        $this->repository = $repository;
    }

}