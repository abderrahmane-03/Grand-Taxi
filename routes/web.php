<?php
use App\Models\Driver;

use App\Models\Review;
use App\Models\Passenger;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredDriverController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');})->name('llogin');;
;

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/passenger-dashboard', function () {
    return view('passenger-dashboard');
});
Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->name('admin-dashboard'); // <-- Corrected route name

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/driver-register', function () {
    return view('auth.driver-register');
});

Route::put('/admin-dashboard/{driver}/bann', [AdminController::class, 'bann'])->name('bann.driver');
Route::put('/admin-dashboard/{driver}/unbann', [AdminController::class, 'unbann'])->name('unbann.driver');

Route::put('/admin-dashboard/{reservation}/ban', [AdminController::class, 'Rbann'])->name('bann.reservation');
Route::put('/admin-dashboard/{reservation}/unban', [AdminController::class, 'Runbann'])->name('unbann.reservation');

Route::put('/admin-dashboard/{passenger}/bban', [AdminController::class, 'Pbann'])->name('bann.passenger');
Route::put('/admin-dashboard/{passenger}/unbban', [AdminController::class, 'Punbann'])->name('unbann.passenger');


Route::get('/admin-dashboard', [AdminController::class, 'all'])->name('admin-dashboard');

Route::put('/driver/{driver}', [RegisteredDriverController::class, 'update'])->name('driver.update');

Route::post('/driver-register', [RegisteredDriverController::class, 'store'])->name('driver-register');

Route::post('/reservation/store',[ReservationController::class,'store'])->name('reservation.store');
Route::post('/review/store',[ReviewController::class,'store'])->name('review.store');


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/driver-dashboard', function () {
        // Retrieve the driver information based on the logged-in user's ID

        $driver = Driver::where('user_id', Auth::id())->first();
        if ($driver->banned == 1 ) {
            return redirect()->route('llogin')->with('error', 'please contact us if you think we made a mistake.');
        }
        if (!$driver) {
            // Handle the case where the driver doesn't exist
            return redirect()->route('llogin')->with('error', 'Driver information not found.');
        }
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


    Route::delete('/passenger-dashboard', [ReservationController::class,'destroy'])->name('reservation.delete');
    Route::post('/passenger-dashboard', [RegisteredUserController::class,'filter'])->name('driver-filtre');
    Route::get('/passenger-dashboard', function () {
            // Retrieve the driver information based on the logged-in user's ID
            $passenger= Passenger::where('user_id', Auth::id())->first();
            if ($passenger->banned == 1 ) {
                return redirect()->route('llogin')->with('error', 'please contact us if you think we made a mistake.');
            }
            $reservations = Reservation::where('passenger_id', $passenger->id,'deleted',0)->get();
            $alldrivers=Driver::where('banned', 0)->get();
            $drivers = [];
            $reviews = [];
            $avgs=[];

           foreach ($reservations as $reservation) {
                $reviews[$reservation->id] = Review::where('reservation_id', $reservation->id)->get();
                $drivers[$reservation->id] = Driver::where('id', $reservation->driver_id)->get();

            }
            foreach($alldrivers as $alldriver){
                $avgs[$alldriver->id] = DB::table('reservations')->join('reviews', 'reviews.reservation_id', '=', 'reservations.id')->where('driver_id',$alldriver->id)->avg('rating');

            }

            return view('passenger-dashboard', compact( 'passenger','drivers','alldrivers', 'reviews','reservations','avgs'));
        })->name('passenger-dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
