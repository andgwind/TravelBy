<?php 

namespace App\Services\Api\V1;

use App\Models\Travel;
use App\Repository\Api\V1;
use App\Repository\Api\V1\TourRepository;

class TourService
{   
    private TourRepository $tourRepository;

    public function __construct(TourRepository $tourRepository)
    {
        $this->tourRepository = $tourRepository;
    }

    public function getTourByTravelSlug(
        string $travelId, 
        array $filters, 
        int $perPage = 15) 
    {
        return $this->tourRepository->getTourByTravelSlug($travelId, $filters, $perPage);
    }

    public function store(array $tourData, Travel $travel)
    {
        return $this->tourRepository->store($tourData, $travel);
    }
}