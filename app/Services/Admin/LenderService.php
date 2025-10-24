<?php

namespace App\Services\Admin;

use App\Core\Services\AbstractService;
use App\Repositories\Admin\LenderRepository;

class LenderService extends AbstractService
{
    public function __construct(LenderRepository $repository)
    {
        $this->repository = $repository;
    }

}