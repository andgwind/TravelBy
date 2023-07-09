<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Http\Resources\V1\TravelCollection;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travel = Travel::where('is_public', true)->paginate();

        return new TravelCollection($travel);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        //
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
