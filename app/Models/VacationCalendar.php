<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacationCalendar extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = ['corp_id', 'office_id', 'vacation_date'];


    protected $casts = [
        'vacation_date' => 'date',
    ];

        public function corp()
    {
        return $this->belongsTo(Corp::class, 'corp_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function scopeGetHolidaysForRange($query, $startDate, $endDate, $officeId)
    {
        return $query->whereBetween('vacation_date', [$startDate, $endDate])
                     ->where('office_id', $officeId)
                     ->get();
    }

}
