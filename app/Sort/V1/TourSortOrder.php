<?php

namespace App\Sort\V1;

use App\Sort\SortOrderBy;

class TourSortOrder extends SortOrderBy
{
    protected array $filters = [];

    protected array $SortQuery = [];

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    protected $SortFieldParams = [
        'sortBy' => ['price'],
    ];

    protected function setColumnsQuery()
    {
        foreach ($this->filters as $filter => $field) {
            ////
        }
    }

    public function getColumnsQuery(): array
    {
        $this->setColumnsQuery();

        return $this->SortQuery;
    }
}
