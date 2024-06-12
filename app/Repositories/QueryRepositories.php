<?php

namespace App\Repostiories;
use App\Repostiories\Interfaces\QueryIntefaces;
use Illuminate\Database\Eloquent\Model;

class QueryRepositories implements QueryIntefaces{
    protected Model $model;
    protected int $paginate;
    public function __construct($model, int $paginate = 0)
    {
        $this->model = new $model;
        $this->paginate = $paginate;
    }

    private function result($query, $count)
    {
        return ($count) ? $query->count()
            : (($this-> paginate) ? $query->paginate($this->paginate)
            : $query->get());
    }
    public function all($relational = [], bool $count = false){
        $query = $this->model->with($relational);
        return $this->result($query,$count);
    }
    public function where(array $data ,$relational = [], array $operator = [] , bool $count = false)
    {
        if(count($operator) == count($data))
        {
            $query = $this->model->with($relational);
            $operatorIndex = 0;
            foreach ($data as $key => $value) {
                $validOperators = ['=', '!=', '>', '<', '>=', '<='];
                if (!in_array($operator[$operatorIndex], $validOperators)) {
                    throw new \InvalidArgumentException("Invalid operator provided.");
                }
                $query->where($key,$operator[$operatorIndex],$value);
                $operatorIndex++;
            }
            return $this->result($query,$count);
        }
        throw new \InvalidArgumentException("Number of operators does not match number of data elements.");
    }
    public function search(array $data, $relational = [],bool $count = false)
    {
        $query = $this->model->with($relational);
        foreach($data as $key => $value)
        {
            $query->where($key,'LIKE','%'.$value.'%');
        }
        return $this->result($query,$count);

    }
    public function orderBy(array $data, $relational = [], string $direction= 'ASC', bool $count = false)
    {
        $query = $this->model->with($relational)->orderBy($data,$direction);
        return $this->result($query,$count);
    }
    public function groupBy(array $data, $relational = [], bool $count = false)
    {
        $query = $this->model->with($relational)->groupBy($data);
        return $this->result($query,$count);
    }
}
