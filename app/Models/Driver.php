<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends User
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'description',
        'vehicle_type',
        'license_plate',
        'payment_accepted',
        'start_location',
        'destination',
    ];

    // Additional methods specific to the Driver model
}
