<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\CustomerRepository;

class CustomerService extends AbstractService
{

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }
}