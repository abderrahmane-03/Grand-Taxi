<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    //
   public function store(Request $request){
    $data = $request->validate([
        'driver_id' => 'required',
        'passenger_id' => 'required',
        'starting_time' => 'required',
        'start_location' => 'required',
        'status'=>'nullable',
        'destination'=>'required',
    ]);

    Reservation:: create($data);
    redirect('/passenger-dashboard');
}
}
