<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        
    ];

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }
    public function passenger()
    {
        return $this->hasMany(Passenger::class);
    }
    // Define common methods and attributes here
}
