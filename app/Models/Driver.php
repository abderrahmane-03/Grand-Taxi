<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends User
{
    use HasFactory;
    // protected $table = 'users';
    protected $fillable = [
        'description',
        'vehicule_type',
        'license_plate',
        'payment_accepted',
        'availablity_status',
        'start_location',
        'destination',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'driver_id');
    }
    // Additional methods specific to the Driver model
}
