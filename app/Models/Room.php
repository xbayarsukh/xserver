<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'office_id'];



    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


}
