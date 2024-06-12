<?php

namespace App\Repositories\Interfaces;


interface QueryInterfaces{
    public function all($relational = [], bool $count = false);
    public function where(array $data ,$relational = [], array $operator = [], bool $count = false);
    public function search(array $data, $relational = [],bool $count = false);
    public function orderBy(array $data, $relational = [], string $direction= 'ASC', bool $count = false);
    public function groupBy(array $data, $relational = [], bool $count = false);

}
