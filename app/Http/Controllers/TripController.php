<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Trip;
use App\Models\Location;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::with(['bus'])->latest()->get();
        return view('backend.pages.trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buses = Bus::latest()->get();
        $locations = Location::latest()->get();
        return view('backend.pages.trips.create', compact('buses', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTripRequest $request)
    {

        $trip = Trip::create($request->validated());
        $bus = Bus::find($request->bus_id);
        $busDetails = $trip->bus;
        return redirect()->route('seat-allocations.create')->with([
            'trip_id' => $trip->id,
            'bus_id' => $busDetails->id,
            'total_seat' => $busDetails->total_seat,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        $buses = Bus::latest()->get();
        $locations = Location::latest()->get();
        return view('backend.pages.trips.edit', compact('trip', 'buses', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTripRequest $request, Trip $trip)
    {
        $trip->update($request->validated());

        return redirect()->back()->with('success', 'Trips created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->back()->with('success', 'Trips deleted successfully.');
    }
}
