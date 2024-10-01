<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
         'action_schedule_id',
          'time_slot',
           'color',
           'appointment_date'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function actionSchedule()
    {
        return $this->belongsTo(ActionSchedule::class);
    }
}
