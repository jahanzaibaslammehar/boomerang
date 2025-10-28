<?php

namespace App\Repositories\Admin;

use App\Core\Repositories\AbstractRepository;
use App\Models\Customer;

class CustomerRepository extends AbstractRepository
{

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }
}