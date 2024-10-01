<?php

namespace App\Models;

use Log;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArrivalRecord extends Model
{
    use HasFactory;
    protected $table = 'arrival_records';
 protected $fillable=[
    'user_id',
    'recorded_at',
    'second_recorded_at',
    'created_at',
    'updated_at',
    'deleted_at',
];



protected function serializeDate(DateTimeInterface $date)
{
    return $date->format('Y-m-d H:i:s');
}

public function arrivalDepartureRecords()
{
    return $this->hasMany(DepartureRecord::class, 'arrival_id', 'id');
}
// public function DepartureRecord()
// {
//     //hasOne baisaniig ni hasMany bolgow
//     return $this->hasOne(DepartureRecord::class, 'arrival_id', 'id');
// }


public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

// public function getRecordedAtAttribute($value)
// {
//     return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
// }

// public function setRecordedAtAttribute($value)
// {
//     if ($value) {
//         // Define a default date and time format
//         $dateFormat = 'Y-m-d';
//         $timeFormat = 'H:i:s';

//         // Concatenate date and time formats
//         $format = $dateFormat . ' ' . $timeFormat;

//         // Try to parse the date and time using the concatenated format
//         try {
//             $parsedDateTime = Carbon::createFromFormat($format, $value);
//         } catch (\Exception $e) {
//             // If an exception occurs, log the error or handle it as needed
//             \Log::error('Error parsing date and time:', ['error' => $e->getMessage(), 'value' => $value]);

//             // Set recorded_at to null
//             $this->attributes['recorded_at'] = null;
//             return;
//         }

//         // Ensure it's formatted as expected
//         $this->attributes['recorded_at'] = $parsedDateTime->format('Y-m-d H:i:s');
//     } else {
//         // If $value is empty or null, set recorded_at to null
//         $this->attributes['recorded_at'] = null;
//     }
// }


}
