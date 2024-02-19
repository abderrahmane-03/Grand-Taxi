<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Review;
use App\Models\Passenger;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function Pbann(Passenger $passenger)
    {
        $passenger->banned = 1;
        $passenger->save();
        return redirect()->route('admin-dashboard');

    }
    public function Punbann(Passenger $passenger)
    {
        $passenger->banned = 0;
        $passenger->save();
        return redirect()->route('admin-dashboard');

    }
    public function bann(Driver $driver)
    {
        $driver->banned = 1;
        $driver->save();
        return redirect()->route('admin-dashboard');

    }
    public function unbann(Driver $driver)
    {
        $driver->banned = 0;
        $driver->save();
        return redirect()->route('admin-dashboard');

    }
    public function Rbann(Reservation $reservation)
    {
        $reservation->deleted = 1;
        $reservation->save();
        return redirect()->route('admin-dashboard');

    }
    public function Runbann(Reservation $reservation)
    {
        $reservation->deleted = 0;
        $reservation->save();
        return redirect()->route('admin-dashboard');

    }

    public function all()
    {
        $alldrivers=Driver::get();
        $passengers= Passenger::get();
        $reservations = Reservation::get();
        $reviewss = Review::get();
        $reviews = [];
        $drivers = [];
        $avgs = [];

        foreach ($reservations as $reservation) {
             $reviews[$reservation->id] = Review::where('reservation_id', $reservation->id)->get();
             $drivers[$reservation->id] = Driver::where('id', $reservation->driver_id)->get();

         }

        foreach($alldrivers as $alldriver){
            $avgs[$alldriver->id] = DB::table('reservations')->join('reviews', 'reviews.reservation_id', '=', 'reservations.id')->where('driver_id',$alldriver->id)->avg('rating');

        }


        return view('Admin-dashboard', compact('reviewss','drivers','reviews','avgs','reservations','alldrivers','passengers'));
    }


}
