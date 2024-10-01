<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceTypeRecord extends Model
{
    use HasFactory;
    // protected $guarded=[];
    protected $fillable=[
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function timeOffRequestRecords() {
        return $this->hasMany(TimeOffRequestRecord::class);
    }
}
