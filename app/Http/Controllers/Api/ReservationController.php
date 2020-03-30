<?php

namespace App\Http\Controllers\Api;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function store(Request $request)
    {
        return Reservation::create($request->all());
    }

    public function list()
    {
        return Reservation::all();
    }

    public function show(Reservation $reservation)
    {
        return $reservation;
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return $reservation;
    }

    public function destroy(Reservation $reservation)
    {
        return $reservation->delete();
    }
}
