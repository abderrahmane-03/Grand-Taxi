<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Passenger;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
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
}
