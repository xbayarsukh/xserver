<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Breaks extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'start_time',
        'end_time',
        'start_time2',
        'end_time2',
        'start_time3',
        'end_time3',
    ];

    protected $dates = [
        'start_time',
        'end_time',
        'start_time2',
        'end_time2',
        'start_time3',
        'end_time3',
    ];


       // Helper method to calculate time difference in minutes
       public function getTimeDifferenceInMinutes($start, $end)
       {
           if (!$start || !$end) {
               return 0;
           }
           return Carbon::parse($end)->diffInMinutes(Carbon::parse($start));
       }

       // Method to get total break time in minutes
       public function getTotalBreakTimeInMinutes()
       {
           return $this->getTimeDifferenceInMinutes($this->start_time, $this->end_time)
                + $this->getTimeDifferenceInMinutes($this->start_time2, $this->end_time2)
                + $this->getTimeDifferenceInMinutes($this->start_time3, $this->end_time3);
       }


    public function user()
    {
        return $this->belongsTo(User::class);
     }

}
