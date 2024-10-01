<?php

namespace App\Models;

use Log;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartureRecord extends Model
{
    use HasFactory;

    public $table = 'departure_records';

    protected $fillable = [
        'arrival_id',
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

    public function arrival()
    {
        return $this->belongsTo(ArrivalRecord::class, 'arrival_id');
    }

    // public function getRecordedAtAttribute($value)
    // {
    //     return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    // }

    // public function setRecordedAtAttribute($value)
    // {
    //     if ($value) {
    //         try {
    //             $format = config('panel.date_format') . ' ' . config('panel.time_format');
    //             $this->attributes['recorded_at'] = Carbon::createFromFormat($format, $value)->format('Y-m-d H:i:s');
    //         } catch (\Exception $e) {
    //             // Log the error or handle it as needed
    //             \Log::error('Error parsing date and time:', ['error' => $e->getMessage(), 'value' => $value]);

    //             // Set recorded_at to null
    //             $this->attributes['recorded_at'] = null;
    //         }
    //     } else {
    //         $this->attributes['recorded_at'] = null;
    //     }
    // }
}
