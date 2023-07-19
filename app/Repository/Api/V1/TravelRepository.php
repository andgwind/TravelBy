<?php

namespace App\Repository\Api\V1;

use App\Models\Travel;

class TravelRepository 
{
    public function getPublicTravelsPaginated($perPage = 15) 
    {
        return Travel::where('is_public', true)->paginate($perPage);
    }

    public function store(array $travel) 
    {
        return Travel::create($travel);
    }
}