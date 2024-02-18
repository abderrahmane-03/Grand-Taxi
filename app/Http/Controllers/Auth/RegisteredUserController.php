<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Driver;
use App\Models\Review;
use App\Models\Passenger;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $userdata = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'picture' => ['required'],
        ]);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $pictureName = time() . '.' . $file->extension();
            $file->storeAs('public/image', $pictureName);
            $userdata['picture'] = $pictureName;
        }

        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $userdata['picture'],
        ]);

        // Create a new Passenger instance with the associated user_id
        $passenger = new Passenger();
        $passenger->user_id = $user->id; // Assign the user_id here
        $passenger->save();

        // Trigger the Registered event
        event(new Registered($user));

        Session::flash('success', 'You have registered successfully!');
        return redirect('/login')->withInput(['email' => $request->email]);
    }



    public function filter(Request $request)
    {
        $localisation = $request->input('localisation');
        $vehicleType = $request->input('vehicle_type');
        $rating = $request->input('rating');
        $passenger= Passenger::where('user_id', Auth::id())->first();
        $reservations = Reservation::where('passenger_id', $passenger->id)->get();
        $drivers = [];
        $reviews = [];
        $alldrivers=Driver::get();

       foreach ($reservations as $reservation) {
            $reviews[$reservation->id] = Review::where('reservation_id', $reservation->id)->get();
            $drivers[$reservation->id] = Driver::where('id', $reservation->driver_id)->get();

        }
        foreach($alldrivers as $alldriver){
            $avgs[$alldriver->id] = DB::table('reservations')->join('reviews', 'reviews.reservation_id', '=', 'reservations.id')->where('driver_id',$alldriver->id)->avg('rating');

        }

        // Perform filtering logic using join query
        $filteredDrivers = Driver::query()
        ->where('start_location', $localisation)
        ->orWhere('destination', $localisation)
        ->orWhere('vehicule_type', $vehicleType)
        ->whereHas('reservation.review', function ($query) use ($rating) {
            $query->where('rating', $rating);
            })
            ->get();

        // Pass the filtered data to the view
        return view('passenger-dashboard', ['alldrivers' => $filteredDrivers], compact('avgs','reservations','drivers','reviews','passenger'));
    }
}

