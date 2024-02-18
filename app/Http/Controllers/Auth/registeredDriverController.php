<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredDriverController extends Controller
{

    public function update(Driver $driver ,Request $request){

        $data = $request->validate([
            'payment_accepted' => ['nullable'],
            'availablity_status' => ['nullable'],
            'start_location' => ['nullable'],
            'destination' => ['nullable'],
        ]);
        $driver->update($data);

        return redirect('/driver-dashboard');

    }

    // Other methods...
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
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


       $driverData =  $request->validate([
            'description' => ['required', 'string'],
            'vehicule_type' => ['required', 'string'],
            'license_plate' => ['required', 'string'],
            'payment_accepted' => ['nullable'],
            'availability_status' => ['nullable'],
            'start_location' => ['nullable'],
            'destination' => ['nullable'],
        ]);
        $driverData['user_id'] = $user->id;
        
        // Create a new driver instance
       Driver::create($driverData);

        // Save the driver record
        // $user->driver()->save($driver);

        // Trigger the Registered event
        event(new Registered($user));

        // Log in the newly registered user

        // Redirect to the home page
        Session::flash('success', 'You have registered successfully! Please login to continue.');
        return redirect('/login');

        // Redirect to the login page
    }
}
