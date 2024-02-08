<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredDriverController extends Controller
{
    // Your methods here

    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Driver::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['required', 'image'],
            'description' => ['required', 'string'],
            'vehicle_type' => ['required', 'string'],
            'license_plate' => ['required', 'string'],
            'payment_accepted' => ['nullable'],
            'availability_status' => ['nullable'],
            'start_location' => ['required', 'string'],
            'destination' => ['required', 'string'],
        ]);
    
        // Move the uploaded image to the desired location
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/offers';
        $request->image->move($path, $file_name);
    
        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $file_name,
        ]);
    
        // Create a new driver record associated with the user
        $driver = $user->driver()->create([
            'description' => $request->description,
            'vehicle_type' => $request->vehicle_type,
            'license_plate' => $request->license_plate,
            'payment_accepted' => $request->payment_accepted,
            'availability_status' => $request->availability_status,
            'start_location' => $request->start_location,
            'destination' => $request->destination,
        ]);
    
        // Trigger the Registered event
        event(new Registered($driver));
    
        // Log in the newly registered driver
        Auth::login($driver);
    
        // Redirect to the home page
        return redirect(RouteServiceProvider::HOME);
    }
    
}
