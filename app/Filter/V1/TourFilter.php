<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;

class TourFilter extends ApiFilter {
    
    protected array $query = [];
    protected array $columnQuery = [];

    protected $filterFieldParams = [
        'starting_date' => ['dateFrom', 'dateTo'],
        'price' => ['priceFrom', 'priceTo']
    ];

    protected $filterOperators = [
        'dateFrom' => '>=',
        'dateTo' => '<=',
        'priceFrom' => '>=',
        'priceTo' => '<=',
    ];

    public function __construct(array $query)
    {
        $this->query = $query;
    }


    protected function setColumnsQuery() 
    {
        foreach ($this->query as $param => $value) {
            
            if (!isset($value)) {
                continue;
            }

            foreach ($this->filterFieldParams as $field => $fieldParam) {
              
                if (in_array($param, $this->filterFieldParams[$field])) {
                    $this->columnQuery[] = [$field, $this->filterOperators[$param], $value];
                }
            }
        }
    }

    public function getColumnsQuery(): array
    {
        $this->setColumnsQuery();
        return $this->columnQuery;
    }

}