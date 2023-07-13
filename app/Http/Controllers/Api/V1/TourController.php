<?php

namespace App\Http\Controllers\Api\V1;

use App\Filter\V1\TourFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\IndexTourRequest;
use App\Models\Tour;
use App\Http\Requests\V1\StoreTourRequest;
use App\Http\Requests\V1\UpdateTourRequest;
use App\Http\Resources\V1\TourCollection;
use App\Http\Resources\V1\TravelCollection;
use App\Models\Travel;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Travel $travel, IndexTourRequest $request)
    {
        $query = $request->query();

        $filter = new TourFilter($query);
        $Filteritems = $filter->getColumnsQuery();

        $tour = Tour::where('travel_id', $travel->id)
            ->where($Filteritems)
            ->orderBy('starting_date')
            ->orderBy($request->sortBy, $request->sortOrder)
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
