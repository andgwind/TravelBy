<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\IndexTourRequest;
use App\Models\Tour;
use App\Http\Requests\V1\StoreTourRequest;
use App\Http\Requests\V1\UpdateTourRequest;
use App\Http\Resources\V1\TourCollection;
use App\Http\Resources\V1\TourResource;
use App\Http\Resources\V1\TravelCollection;
use App\Models\Travel;
use App\Services\Api\V1\TourService;

class TourController extends Controller
{
    
    protected TourService $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(IndexTourRequest $request, TourService $tourService, Travel $travel)
    { 
        $filters = $request->query();
        $tours = $this->tourService->getTourByTravelSlug($travel->id, $filters);
        return new TourCollection($tours);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourRequest $request, Travel $travel)
    {
        $tour = $this->tourService->store($request->except(['startingDate', 'endingDate']), $travel);
        return new TourResource($tour);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourRequest $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
