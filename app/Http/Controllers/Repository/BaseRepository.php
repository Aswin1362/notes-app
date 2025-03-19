<?php

namespace App\Http\Controllers\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model::query()->orderBy('created_at', 'desc')->get();
    }

    abstract public function create(array $data);
    abstract public function destroy(array $data);
}
