<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Arrayable;

class AttendanceRecordsExport implements FromCollection
{
    //excel helper
    protected $attendanceRecords;

    public function __construct($attendanceRecords)
    {
        $this->attendanceRecords = $attendanceRecords;
    }

    public function collection()
    {
        return collect($this->attendanceRecords);
    }
}
