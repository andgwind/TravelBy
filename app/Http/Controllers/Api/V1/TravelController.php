<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Http\Requests\V1\StoreTravelRequest;
use App\Http\Requests\V1\UpdateTravelRequest;
use App\Http\Resources\V1\TravelCollection;
use App\Http\Resources\V1\TravelResource;
use App\Services\Api\V1\TravelService;

class TravelController extends Controller
{
    protected TravelService $travelService;

    public function __construct(TravelService $travelService)
    {
        $this->travelService = $travelService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travel = $this->travelService->getPublicTravelsPaginated();

        return new TravelCollection($travel);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelRequest $request)
    {
        $travelData = $request->except(['isPublic', 'numberOfDays']);
        $travel = $this->travelService->store($travelData);

        return new TravelResource($travel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        //
    }
}
