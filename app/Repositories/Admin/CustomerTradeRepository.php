<?php

namespace App\Repositories\Admin;

use App\Core\Repositories\AbstractRepository;
use App\Models\CustomerTrade;

class CustomerTradeRepository extends AbstractRepository
{
    public function __construct(CustomerTrade $model)
    {
        $this->model = $model;
    }
}