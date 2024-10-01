<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Corp;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\VacationCalendar;

class Calendar12Controller extends Controller
{

    public function index()
    {
        $corps = Corp::get();
        $offices = Office::all();

        return view('admin.calendar12.index', compact('corps', 'offices'));
    }

    public function show(Request $request)
    {
        $selectedCorpId = $request->input('corps_id');
        $selectedYear = $request->input('year', date('Y'));

        if (!$selectedCorpId) {
            return redirect()->route('admin.calendar12.index')->withErrors(['error' => 'Please select a company and office.']);
        }


        $selectedCorp = Corp::find($selectedCorpId);
        $calendar = $this->generateCalendar($selectedCorpId, $selectedYear, $selectedCorpId);

        return view('admin.calendar12.show', compact('calendar', 'selectedYear', 'selectedCorpId','selectedCorp'));
    }

    private function generateCalendar($corpId, $year, $selectedCorpId)
    {
        // Fetch holidays for the selected corp, office, and year
        $holidays = VacationCalendar::where('corp_id', $corpId)
            ->whereYear('vacation_date', $year)
            ->get()
            ->pluck('vacation_date')
            ->toArray();

        // Generate the calendar data structure
        $calendar = [];
        for ($month = 1; $month <= 12; $month++) {
            $calendar[$month] = $this->generateMonthCalendar($year, $month, $selectedCorpId, $holidays);
        }

        return $calendar;
    }

    private function generateMonthCalendar($year, $month, $corpId, $holidays)
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $monthCalendar = [];

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::create($year, $month, $day);
            $dayOfWeek = $date->dayOfWeek;

            // Fetch the holiday for the current date and corporation
            $holiday = VacationCalendar::whereDate('vacation_date', $date->format('Y-m-d'))
                ->where('corp_id', $corpId)
                ->first();

            $monthCalendar[$day] = [
                'date' => $date,
                'dayOfWeek' => $dayOfWeek,
                'isHoliday' => $holiday ? true : false,
                'holiday' => $holiday, // Include the holiday instance if found
            ];
        }

        return $monthCalendar;
    }

}
