<?php

namespace App\Repository\Api\V1;

use App\Filter\V1\TourFilter;
use App\Models\Tour;
use App\Models\Travel;

class TourRepository
{
    public function getTourByTravelSlug(
        string $travelId, 
        array $filters, 
        int $perPage) 
    {
        
        $columnsQuery = (new TourFilter($filters))->getColumnsQuery();
        $query = Tour::where('travel_id', $travelId)
            ->where($columnsQuery)
            ->orderBy('starting_date')
            ->when(isset($filters['sortBy']), function ($query) use ($filters) {
                return $query->orderBy($filters['sortBy'], $filters['sortOrder']);
            })
            ->paginate($perPage);

        return $query;
    }

    public function store(array $tourData, Travel $travel)
    {
        
        $tour = $travel->tours()->create($tourData);
        return $tour;
    }

}