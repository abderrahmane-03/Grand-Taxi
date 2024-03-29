<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id');
    }
    public function review()
    {
        return $this->hasone(Review::class);
    }
}
