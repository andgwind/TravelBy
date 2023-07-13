<?php

namespace App\Services\Api\V1;

use App\Repository\Api\V1\TravelRepository;

class TravelService 
{
    protected $travelRepository;

    public function __construct(TravelRepository $travelRepository)
    {
        $this->travelRepository = $travelRepository;
    }

    public function getPublicTravelsPaginated($perPage = 15) {
        return $this->travelRepository->getPublicTravelsPaginated($perPage);
    }
}