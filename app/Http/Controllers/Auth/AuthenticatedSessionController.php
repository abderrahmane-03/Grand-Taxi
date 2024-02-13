<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Driver;
use App\Models\Passenger;
use App\Models\Admin;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Retrieve the authenticated user
        $user = $request->user();

        // Check if the user is a driver
        $driver = Driver::where('user_id', $user->id)->first();
        if ($driver) {
            // Redirect if the user is a driver
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // Check if the user is a passenger
        $passenger = Passenger::where('user_id', $user->id)->first();
        if ($passenger) {
            // Redirect if the user is a passenger
            return redirect()->intended(RouteServiceProvider::PASSENGER);
        }
        $ADMIN = ADMIN::where('user_id', $user->id)->first();
        if ($ADMIN) {
            // Redirect if the user is a ADMIN
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
        return redirect()->route('/');
 }
        

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
