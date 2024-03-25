<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'city',
        'address',
        'rooms',
        'price'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
