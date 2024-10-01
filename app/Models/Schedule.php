<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'title',
        'description',
        'start_time',
        'end_time',
        'user_id',
        'office_id',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

}
