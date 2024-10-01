<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationTypeA extends Model
{
    use HasFactory;
    protected $fillable = [
        'accounting_department',
        'approval_stamp',
        'application_stamp',
        'office',
        'department',
        'name',
        'leave_type',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'reason_select',
        'reason',
    ];
    protected $table = 'application_type_a'; // Correct table name
    public function application()
    {
        return $this->morphOne(Application::class, 'applicationable');
    }

}
