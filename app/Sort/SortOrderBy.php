<?php

namespace App\Sort;

abstract class SortOrderBy
{
    protected array $filters = [];

    protected array $SortQuery = [];

    protected $SortFieldParams = [];

    abstract protected function setColumnsQuery();

    abstract public function getColumnsQuery();
}
