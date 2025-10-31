<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\CustomerTradeRepository;

class CustomerTradeService extends AbstractService
{
    public function __construct(CustomerTradeRepository $repository)
    {
        $this->repository = $repository;
    }
}