<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CrudInterfaces;
use Illuminate\Database\Eloquent\Model;

class CrudRepositories implements CrudInterfaces{

    protected Model $model;
    protected int $paginate;
    public function __construct($model, int $paginate = 0)
    {
        $this->model = new $model;
        $this->paginate = $paginate;
    }
    public function all(){
        return ($this->paginate)
         ? $this->model->paginate($this->paginate)
         : $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        $this->model->create($data);

    }

    public function update(array $data, $id)
    {
        $this->model->find($id)->update($data);

    }

    public function delete($id)
    {
        $this->model->find($id)->delete();

    }
}
