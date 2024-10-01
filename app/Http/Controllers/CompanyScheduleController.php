<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// use App\Models\User;
use App\Models\Office;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\VacationCalendar;
use illuminate\Support\Facades\Auth;

class CompanyScheduleController extends Controller
{


    public function index(Request $request)
    {
        $offices = Office::all();
        $selectedOfficeId = $request->input('office_id');
        $selectedDate = $request->input('date', Carbon::today()->startOfMonth()->toDateString());

        // $users=User::where('office_id', $selectedOfficeId)->get();
        $authUser = Auth::user(); // Get the authenticated user




        $schedules = [];

        $holidays = [];

        if ($selectedOfficeId) {
            $startDate = Carbon::parse($selectedDate)->startOfMonth();
            $endDate = Carbon::parse($selectedDate)->endOfMonth();

            $schedules = Schedule::with('user')
                ->where('office_id', $selectedOfficeId)
                ->whereBetween('start_time', [$startDate, $endDate])
                ->get();


              // Fetch vacations
        $vacations = VacationCalendar::whereBetween('vacation_date', [$startDate, $endDate])
        ->where('corp_id', $selectedOfficeId)
        ->get();

                    // Transform vacations into a more usable format
        foreach ($vacations as $vacation) {
            $holidayDate = $vacation->vacation_date instanceof Carbon
                ? $vacation->vacation_date->format('Y-m-d')
                : Carbon::parse($vacation->vacation_date)->format('Y-m-d');
            $holidays[$holidayDate] = 'Vacation Day';
        }



        }



        return view('companySchedule.index', compact('offices', 'selectedOfficeId', 'selectedDate','authUser','schedules','holidays'));
    }


    public function store(Request $request)
    {
        try {
            \Log::info('Received schedule data:', $request->all());

            $validatedData = $request->validate([
                'title' => 'required|string',
                'description' => 'nullable|string',
                'start_time' => 'required|date_format:Y-m-d H:i:s', // Ensure both date and time are required
                'end_time' => 'nullable|date_format:Y-m-d H:i:s|after_or_equal:start_time',
                'user_id' => 'required|exists:users,id',
                'office_id' => 'required|exists:offices,id',
                'color' => 'nullable|string',
            ]);

            $schedule = Schedule::create($validatedData);

            \Log::info('Schedule created successfully:', $schedule->toArray());

            return response()->json(['success' => true, 'schedule' => $schedule]);
        } catch (\Exception $e) {
            \Log::error('Error saving schedule: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function getSchedules(Request $request)
    {
        $officeId=$request->input('office_id');
        $startDate=Carbon::parse($request->input('start_date'));
        $endDate=Carbon::parse($request->input('end_date'));

        $schedules=Schedule::with('user')
            ->where('office_id', $officeId)
            ->whereBetween('start_time', [$startDate, $endDate])
            ->get();

        return response()->json($schedules);
    }



    public function edit($id)
    {
        $schedule=Schedule::findOrFail($id);
        return response()->json($schedule);
    }

    public function update(Request $request,$id)
    {
        $schedule=Schedule::findOrFail($id);
        $schedule->update($request->all());

        return response()->json(['success'=>true, 'schedule'=>$schedule]);
    }


        public function destroy($id)
        {
            $schedule=Schedule::findOrFail($id);
            $schedule->delete();

            return response()->json(['success'=>true]);
        }








}
