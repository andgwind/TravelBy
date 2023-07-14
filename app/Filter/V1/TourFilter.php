<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;


class TourFilter extends ApiFilter {
    
    protected array $filters = [];
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
    
    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    protected function setPriceValueAtCents($value) 
    {
        return $value * 100;
    }

    protected function setColumnsQuery() 
    {
        foreach ($this->filters as $param => $value) {
            
            if (!isset($value)) {
                continue;
            }

            foreach ($this->filterFieldParams as $field => $fieldParam) {
              
                if (in_array($param, $this->filterFieldParams[$field])) {

                    if ($field == 'price') {
                        $value = $this->setPriceValueAtCents($value);
                    }

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

    // public function apply(Builder $builder): Builder
    // {
    //     foreach ($this->getColumnsQuery() as $query) {
    //         $builder->where($query[0], $query[1], $query[2]);
    //     }
    //     return $builder;
    // }

}