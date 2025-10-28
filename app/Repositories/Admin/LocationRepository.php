<?php

namespace App\Repositories\Admin;

use App\Core\Repositories\AbstractRepository;
use App\Models\Location;

class LocationRepository extends AbstractRepository
{
    public function __construct(Location $model)
    {
        $this->model = $model;
    }
    // Repository methods for Location entity
}