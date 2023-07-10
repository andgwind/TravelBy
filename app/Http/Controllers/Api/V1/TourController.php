<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Http\Resources\V1\TourCollection;
use App\Http\Resources\V1\TravelCollection;
use App\Models\Travel;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Travel $travel)
    {
        $tour = Tour::where('travel_id', $travel->id)
            ->orderBy('starting_date')
            ->paginate();
        return new TourCollection($tour);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourRequest $request)
    {
        //
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
