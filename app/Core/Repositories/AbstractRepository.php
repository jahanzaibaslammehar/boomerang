<?php

namespace App\Core\Repositories;

use Exception;
use Illuminate\Http\Request;
use App\Traits\RepositoryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use App\Core\Contracts\Repositories\AbstractRepositoryInterface;


abstract class AbstractRepository implements AbstractRepositoryInterface
{

    use RepositoryTrait;

    protected $model;

    protected $limit = 100;

    protected $order = 'DESC';

    protected $pagination = true;

    public function create(array $request): Model
    {
        try {
            return $this->model->create($request);
        } catch (QueryException $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function updateOrCreate($conditions, $data): Model
    {
        try {
            return $this->model->updateOrCreate($conditions, $data);
        } catch (QueryException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function createMany(array $data)
    {
        try {
            return $this->model->insert($data);
        } catch (QueryException $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function update(int|string $id, array $data): bool
    {
        try {
            return $this->model->findOrFail($id)->update($data);
        } catch (QueryException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getById(int|string $id, array $with = []): Model
    {
        try {
            $data = $this->model->with($with)->findOrFail($id);
        } catch (RelationNotFoundException $e) {
            throw new RelationNotFoundException($e->getMessage());
        }
        if (!$data) {
            throw new ModelNotFoundException('Record not found');
        }

        return $data;
    }

    public function queryBuilderByCondition(array $conditions, array $with = [], $limit = 10)
    {
        $query = $this->model->query()
            ->where($conditions)
            ->with($with)->limit($limit ?? $this->limit);
        return $query;
    }

    public function getByCondition(array $conditions, array $with = []): LengthAwarePaginator|Collection
    {
        try {
            $query = $this->queryBuilderByCondition($conditions, $with);
            if ($this->pagination) {
                $data = $query->paginate($this->limit);
            } else {
                $data = $query->get();
            }
        } catch (RelationNotFoundException $e) {
            throw new RelationNotFoundException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        if (!$data) {
            throw new ModelNotFoundException('Record not found');
        }
        return $data;
    }

    public function getWhere(array $conditions, array $with = []): Model
    {
        try {
            $data = $this->model->where($conditions)->with($with)->first();
        } catch (RelationNotFoundException $e) {
            throw new RelationNotFoundException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        if (!$data) {
            throw new ModelNotFoundException('Record not found');
        }
        return $data;
    }

    public function getList(array $with = []): LengthAwarePaginator
    {
        try {
            $query = $this->model->with($with)->orderBy('created_at', 'desc')->limit($this->limit);
            if ($this->pagination) {
                $data = $query->paginate($this->limit);
            } else {
                $data = $query->get();
            }
        } catch (RelationNotFoundException $e) {
            throw new RelationNotFoundException($e->getMessage());
        }

        return $data;
    }

    public function getListWithGroupBy(array $with = [], string $groupBy = null)
    {
        try {
            $query = $this->model->with($with)->orderBy('id', $this->order)->limit($this->limit);

            if ($this->pagination) {
                $data = $query->paginate($this->limit);
            } else {
                $data = $query->get();
            }
            if ($groupBy) {
                $data = $data->groupBy($groupBy);
            }
        } catch (RelationNotFoundException $e) {
            throw new RelationNotFoundException($e->getMessage());
        }

        return $data;
    }

    public function destroy(Model $model): bool
    {
        return $model->delete();
    }

    public function destroyMany($conditions): bool
    {
        return $this->model->where($conditions)->delete();
    }


    public function executeSearch($request, array $searchableFields, array $with = [], ?string $defaultSortField = 'created_at', ?int $limit = null)
    {
        try {
            if (!$limit) {
                $limit = $this->limit;
            }

            $sortBy = $request instanceof Request
                ? $request->input('sort_by', $defaultSortField)
                : ($request['sort_by'] ?? $defaultSortField);

            $sortDirection = $request instanceof Request
                ? $request->input('sort_direction', $this->order)
                : ($request['sort_direction'] ?? $this->order);

            $query = $this->model->with($with);

            // Apply search filters for each searchable field
            $query->where(function ($q) use ($request, $searchableFields) {
                foreach ($searchableFields as $field) {
                    if ($request instanceof Request) {
                        $q->when($request->filled($field), function ($subQuery) use ($request, $field) {
                            $subQuery->orWhere($field, 'ilike', '%' . $request->input($field) . '%');
                        });
                    } else {
                        $q->when(isset($request[$field]) && $request[$field] != '', function ($subQuery) use ($request, $field) {
                            $subQuery->orWhere($field, 'ilike', '%' . $request[$field] . '%');
                        });
                    }
                }
            });

            // Apply sorting
            if ($request instanceof Request) {
                $query->when($request->filled('sort_by'), function ($query) use ($sortBy, $sortDirection) {
                    $query->orderBy($sortBy, $sortDirection);
                }, function ($query) use ($defaultSortField) {
                    $query->orderBy($defaultSortField, $this->order);
                });
            } else {
                $query->when(isset($request['sort_by']) && $request['sort_by'] != '', function ($query) use ($sortBy, $sortDirection) {
                    $query->orderBy($sortBy, $sortDirection);
                }, function ($query) use ($defaultSortField) {
                    $query->orderBy($defaultSortField, $this->order);
                });
            }

            return $query->paginate($limit);
        } catch (QueryException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
