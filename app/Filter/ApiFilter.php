<?php

namespace App\Filter;

abstract class ApiFilter {
    
    protected array $filters = [];
    protected array $columnQuery = [];

    protected $filterFieldParams = [];
    protected $filterOperators = [];

    abstract protected function setColumnsQuery();

    abstract public function getColumnsQuery();

}