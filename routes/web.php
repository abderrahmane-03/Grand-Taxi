<?php
use App\Http\Controllers\Auth\RegisteredDriverController;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Models\Frequent_trips;
use App\Models\Passenger;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Driver;
use App\Models\Review;

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/passenger-dashboard', function () {
    return view('passenger-dashboard');
});
Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
});
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/driver-register', function () {
    return view('auth.driver-register');
});


Route::put('/driver/{driver}', [RegisteredDriverController::class, 'update'])->name('driver.update');

Route::post('/driver-register', [RegisteredDriverController::class, 'store'])->name('driver-register');

Route::post('/reservation/store',[ReservationController::class,'store'])->name('reservation.store');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/driver-dashboard', function () {
        // Retrieve the driver information based on the logged-in user's ID
        $driver = Driver::where('user_id', Auth::id())->first();
        $reservations = Reservation::where('driver_id', $driver->id)->get();
        $passengers = [];
        $reviews = [];
        $avg = DB::table('reservations')->join('reviews', 'reviews.reservation_id', '=', 'reservations.id')->where('driver_id',$driver->id)->avg('rating');
       
       foreach ($reservations as $reservation) {
            $reviews[$reservation->id] = Review::where('reservation_id', $reservation->id)->get();
            $passengers[$reservation->id] = Passenger::where('id', $reservation->passenger_id)->get();

        }

        return view('driver-dashboard', compact('driver', 'reservations', 'reviews', 'passengers','avg'));
    })->name('driver-dashboard');


    
     Route::get('/passenger-dashboard', function () {
            // Retrieve the driver information based on the logged-in user's ID
            $passenger= Passenger::where('user_id', Auth::id())->first();
            $reservations = Reservation::where('passenger_id', $passenger->id)->get();
            $drivers = [];
            $reviews = [];
           
           foreach ($reservations as $reservation) {
                $reviews[$reservation->id] = Review::where('reservation_id', $reservation->id)->get();
                $drivers[$reservation->id] = Driver::where('id', $reservation->driver_id)->get();
    
            }
    
            return view('passenger-dashboard', compact( 'drivers', 'reviews','reservations'));
        })->name('passenger-dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
