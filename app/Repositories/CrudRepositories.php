<?php

namespace App\Repostiories;
use App\Repostiories\Interfaces\CrudIntefaces;
use Illuminate\Database\Eloquent\Model;

class CrudRepositories implements CrudIntefaces{

    protected Model $model;
    protected int $paginate;
    public function __construct($model, int $paginate = 0)
    {
        $this->model = new $model;
        $this->paginate = $paginate;
    }
    public function all(){
        return ($this->paginate)
         ? $this->model->all()->paginate($this->paginate)
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
