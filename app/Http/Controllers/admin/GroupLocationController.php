<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateGroupLocationRequest;
use App\Services\Admin\GroupLocationService;
use Illuminate\Http\Request;

class GroupLocationController extends Controller
{
    public function __construct(private GroupLocationService $service)
    {
        
    }

    public function index(Request $request)
    {
        return $this->service->list();
    }

    public function store(CreateGroupLocationRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
