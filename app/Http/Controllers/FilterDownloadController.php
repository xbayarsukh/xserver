<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Corp;
use App\Models\User;
use App\Models\ArrivalRecord;
use App\Models\DepartureRecord;
use App\Models\Office;
use League\Csv\Writer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\AttendanceRecordsExport;

class FilterDownloadController extends Controller
{


    private function getAttendanceRecords($users, $startDate, $endDate)
    {
        //iim private helper function vvsgej surah heregtein baina
        $attendanceRecords = [];

        foreach ($users as $user) {
            $currentDate = Carbon::parse($startDate);
            $endDate = Carbon::parse($endDate);

            while ($currentDate <= $endDate) {
                $record = [
                    'date' => $currentDate->format('Y-m-d'),
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                ];

                // Fetch attendance type for the current date
                $timeOffRecordForDay = $user->timeOffRequestRecords->where('date', $currentDate->format('Y-m-d'))->first();
                if ($timeOffRecordForDay) {
                    $record['attendance_type'] = $timeOffRecordForDay->attendanceTypeRecord->name;
                } else {
                    $record['attendance_type'] = '';
                }

                // Fetch arrival time for the current date
                $arrivalRecord = $user
                    ->userArrivalRecords()
                    ->where('recorded_at', '>=', $currentDate->copy()->startOfDay())
                    ->where('recorded_at', '<=', $currentDate->copy()->endOfDay())
                    ->first();

                if ($arrivalRecord) {
                    $record['start_time'] = Carbon::parse($arrivalRecord->recorded_at)->format('H:i');

                    // Check if $arrivalRecord has related arrivalDepartureRecords
                    if ($arrivalRecord->arrivalDepartureRecords->count() > 0) {
                        $record['end_time'] = Carbon::parse($arrivalRecord->arrivalDepartureRecords->first()->recorded_at)->format('H:i');

                        // Calculate the working hours
                        $arrivalTime = Carbon::parse($arrivalRecord->recorded_at);
                        $departureTime = Carbon::parse($arrivalRecord->arrivalDepartureRecords->first()->recorded_at);

                        // Define constants for the workday, break, and lunch times
                        $regularStartTime = strtotime('08:30');
                        $breakStartTime1 = strtotime('11:00');
                        $breakEndTime1 = strtotime('11:10');
                        $lunchStartTime = strtotime('12:00');
                        $lunchEndTime = strtotime('13:00');
                        $breakStartTime2 = strtotime('13:00');
                        $breakEndTime2 = strtotime('13:10');
                        $breakStartTime3 = strtotime('17:30');
                        $breakEndTime3 = strtotime('17:40');
                        $regularEndTime = strtotime('17:30');

                        // Initialize total worked minutes for the day
                        $totalWorkedMinutes = 0;

                        // Calculate worked time if $arrivalTime and $departureTime are provided
                        if ($arrivalRecord && $arrivalRecord->arrivalDepartureRecords->count() > 0) {
                            $workedStartTime = strtotime($arrivalTime->format('H:i'));
                            $workedEndTime = strtotime($departureTime->format('H:i'));

                            // Calculate worked time before lunch break
                            $beforeLunchWorkedTime = min($lunchStartTime, $workedEndTime) - $workedStartTime;
                            $totalWorkedMinutes += $beforeLunchWorkedTime / 60;

                            // Subtract first break time if applicable
                            if ($workedStartTime < $breakStartTime1 && $workedEndTime >= $breakEndTime1) {
                                $totalWorkedMinutes -= 10;
                            }

                            // Calculate worked time after lunch break
                            $afterLunchWorkedTime = max(0, $workedEndTime - max($workedStartTime, $lunchEndTime));
                            $totalWorkedMinutes += $afterLunchWorkedTime / 60;

                            // Subtract second break time if applicable
                            if ($workedStartTime < $breakStartTime2 && $workedEndTime >= $breakEndTime2) {
                                $totalWorkedMinutes -= 10;
                            }

                            // Subtract the new break time if applicable
                            if ($workedStartTime < $breakStartTime3 && $workedEndTime >= $breakEndTime3) {
                                $totalWorkedMinutes -= 10;
                            }
                        }

                        // Format the total worked time
                        $record['working_hours'] = sprintf('%02d:%02d', floor($totalWorkedMinutes / 60), $totalWorkedMinutes % 60);
                    } else {
                        $record['end_time'] = '';
                        $record['working_hours'] = '';
                    }
                } else {
                    $record['start_time'] = '';
                    $record['end_time'] = '';
                    $record['working_hours'] = '';
                }

                $attendanceRecords[] = $record;
                $currentDate->addDay();
            }
        }

        return $attendanceRecords;
    }


    public function downloadCSV(Request $request)
    {
        $corpId = $request->input('corps_id');
        $officeId = $request->input('office_id');
        $selectedYear = $request->input('year', date('Y'));
        $selectedMonth = $request->input('month', date('m'));

        $users = User::query();
        if ($corpId) {
            $users->whereHas('office', function ($query) use ($corpId) {
                $query->where('corp_id', $corpId);
            });
        }
        if ($officeId) {
            $users->where('office_id', $officeId);
        }

        $users = $users->get();
        $startDate = Carbon::create($selectedYear, $selectedMonth, 16)->subMonth();
        $endDate = Carbon::create($selectedYear, $selectedMonth, 15);

        $attendanceRecords = $this->getAttendanceRecords($users, $startDate, $endDate);

        $csv = Writer::createFromPath('php://temp', 'w+');
        $csv->setOutputBOM(Writer::BOM_UTF8); // Set UTF-8 BOM
        $headers = ['日付け', 'ID','氏名', '勤怠区分', '始業時刻', '終業時刻', '労働時間'];
        $csv->insertOne($headers);

        foreach ($attendanceRecords as $record) {
            $formattedDate = Carbon::parse($record['date'])->format('Y/m/d');

            $csv->insertOne([
                $formattedDate,
                $record['user_id'],
                $record['user_name'],
                $record['attendance_type'],
                $record['start_time'],
                $record['end_time'],
                $record['working_hours'],
            ]);
        }

        $csv->output('attendance_records.csv');
    }


}
