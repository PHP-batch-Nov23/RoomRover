<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'hotel_id',
        'customer_name',
        'no_people',
        'start_date',
        'end_date',
        'rooms_book',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
