<?php

namespace App\Core\Services;

use App\Services\FileUpload;
use Illuminate\Http\Request;
use App\Helpers\ResponseCode;
use Illuminate\Database\Eloquent\Model;
use App\Core\Contracts\Services\AbstractServiceInterface;
use App\Helpers\UploadFile;

class AbstractService implements AbstractServiceInterface
{
    protected $repository;

    protected $response;

    public $request;

    protected $responseMessage;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create(array $request): Model
    {
        return $this->repository->create($request);
    }

    public function createMany(array $data): bool
    {
        return $this->repository->createMany($data);
    }

    public function updateOrCreate($conditions, $request): Model
    {
        return $this->repository->updateOrCreate($conditions, $request);
    }


    public function list(array $with = [], $limit = null)
    {
        if ($limit) {
            $this->repository->setLimit($limit);
        }

        return $this->repository->getList($with);
    }

    public function listWithGroupBy(array $with = [], $limit = null, string $groupBy = null)
    {
        if ($limit) {
            $this->repository->setLimit($limit);
        }
        return $this->repository->getListWithGroupBy($with, $groupBy);
    }

    public function getByCondition(array $conditions, $with = [], $limit = null,)
    {
        if ($limit) {
            $this->repository->setLimit($limit);
        }

        return $this->repository->getByCondition($conditions, $with);
    }

    public function getWhere(array $conditions, $with = [])
    {
        return $this->repository->getWhere($conditions, $with);
    }

    public function getById(int|string $id, array $with = []): Model
    {
        return $this->repository->getById($id, $with);
    }

    public function update(array $data, array $with = []): Model
    {
        $this->repository->update($data['id'], $data);

        return $this->repository->getById($data['id'], $with);
    }

    public function destroy(Model $model)
    {
        $this->repository->destroy($model);

        $this->response->setResponse(ResponseCode::SUCCESS, ResponseCode::REGULAR, $this->response->getDeleteResponseMessage());

        return $this->response;
    }

    public function setPagination(bool $paginate): void
    {
        $this->repository->setPagination($paginate);
    }

    public function setOrder(string $order): void
    {
        $this->repository->setOrder($order);
    }

    public function setLimit(int $limit): void
    {
        $this->repository->setLimit($limit);
    }
}
