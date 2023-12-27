<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::latest()->get();
        return view('backend.pages.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        Location::create($request->validated());

        return redirect()->back()->with('success', 'Locations created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('backend.pages.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->validated());

        return redirect()->back()->with('success', 'Locations created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->back()->with('success', 'Locations deleted successfully.');
    }
}
