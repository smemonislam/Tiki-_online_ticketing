<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SeatAllocation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeatAllocationRequest;
use App\Http\Requests\UpdateSeatAllocationRequest;

class SeatAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seatAllocations = SeatAllocation::with(['trip.bus', 'trip.location', 'user'])
            ->latest()
            ->get()
            ->map(function ($seatAllocation) {

                $bus = $seatAllocation->trip->bus;
                $location = $seatAllocation->trip->location;
                $departureTime = $seatAllocation->trip;
                $arrivalTime = $seatAllocation->trip;
                $userName = $seatAllocation->user->name;
                $remainingSeats = $bus->total_seat - $bus->seatAllocations->count();

                return [
                    'seat_allocation_id' => $seatAllocation->id,
                    'trip_id' => $seatAllocation->trip_id,
                    'bus_id' => $bus->id,
                    'user_name' => $userName,
                    'bus_name' => $bus->bus_name,
                    'origin' => $location->origin,
                    'destination' => $location->destination,
                    'departure_time' => $departureTime->departure_time,
                    'arrival_time' => $arrivalTime->arrival_time,
                    'total_seats' => $bus->total_seat,
                    'remaining_seats' => $remainingSeats,
                    'seat_number' => $seatAllocation->seat_number,
                ];
            });

        return view('backend.pages.seat-allocations.index', compact('seatAllocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $seatAllocations = SeatAllocation::pluck('seat_number')->toArray();
        return view('backend.pages.seat-allocations.create', compact('seatAllocations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeatAllocationRequest $request)
    {
        $data_user = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ];

        $user = User::create($data_user);

        $data_trip = [
            'trip_id' => $request->input('trip_id'),
            'bus_id' => $request->input('bus_id'),
            'user_id' => $user->id,
            'seat_number' => $request->input('seat_number'),
        ];

        SeatAllocation::create($data_trip);

        return redirect()->route('seat-allocations.index')->with('success', 'Tickets created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SeatAllocation $seatAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeatAllocation $seatAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeatAllocationRequest $request, SeatAllocation $seatAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeatAllocation $seatAllocation)
    {
        //
    }
}
