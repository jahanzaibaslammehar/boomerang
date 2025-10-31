<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\CustomerRebateRepository;

class CustomerRebateService extends AbstractService
{
    public function __construct(CustomerRebateRepository $repository)
    {
        $this->repository = $repository;
    }
}