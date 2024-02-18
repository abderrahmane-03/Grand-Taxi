<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    //
    public function destroy(Request $request) {
        $reservationId = $request->input('reservation_id');
        $reservation = Reservation::findOrFail($reservationId);
        $reservation->delete();

        return redirect('/passenger-dashboard');
    }
   public function store(Request $request){
    $data = $request->validate([
        'driver_id' => 'required',
        'passenger_id' => 'required',
        'starting_time' => 'required',
        'start_location' => 'required',
        'destination'=>'required',
    ]);



    Reservation:: create($data);
    return redirect('/passenger-dashboard');
}
}
