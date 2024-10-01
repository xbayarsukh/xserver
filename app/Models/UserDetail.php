<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'previous_name',
        'phone_number',
        'mobile_number',
        'mobile_email',
        'driver_license',
        'tax_table',
        'tax_type',
        'pay_system',
        'bonus_system',
        'employee_type',
        'work_type',
        'job_title',
        'employed_date',
        'disability_type',
        'working_student',
        'disaster_victim',
        'foreigner',
        'spouse_deduction',
        'household_name',
        'household_relation',
        'disability_detail',
        'salary',
        'insurance_number',
        'nursing_insurance',
        'pension_number',
        'pension_date',
        'employment_insurance',
        'employment_insurance_number',
        'employment_insurance_date',
        'accident_compensation',
        'oneway_comute_distance',
        'paid_leave_start',
        'paid_day_time',
        'marital_status',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
