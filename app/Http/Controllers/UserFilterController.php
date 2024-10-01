<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Corp;
use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\VacationCalendar;

class UserFilterController extends Controller

{


    public function index(Request $request)
    {
        $corps = Corp::get();
        $offices = collect();
        $selectedCorpId = $request->input('corps_id');
        $selectedYear = $request->input('year', date('Y'));
        $selectedMonth = $request->input('month', date('n'));

        // Retrieve offices based on the selected corporation ID
        if ($selectedCorpId) {
            $offices = Office::where('corp_id', $selectedCorpId)->get();
        } else {
            $offices = Office::all();
        }

        // Fetch all users without any filters
        $users = User::with('office')->get();

        // Paginate the results
        $users = $users->all();

        return view('other', compact('corps', 'offices', 'selectedCorpId', 'selectedYear', 'selectedMonth', 'users'));
    }


    public function filter(Request $request)
    {
        // Fetch users based on the selected corp and office
        $corpId = $request->input('corps_id');
        $officeId = $request->input('office_id');
        $userId = $request->input('user_id');
        $selectedYear = $request->input('year', date('Y'));
        $selectedMonth = $request->input('month', date('n'));




        $users = User::query();

        if ($corpId && $officeId && $userId !== 'all') {
            $users->whereHas('office', function ($query) use ($corpId, $officeId) {
                $query->where('corp_id', $corpId)
                    ->where('id', $officeId);
            })->where('id', $userId);
        } elseif ($corpId && $officeId && $userId === 'all') {
            $users->whereHas('office', function ($query) use ($corpId, $officeId) {
                $query->where('corp_id', $corpId)
                    ->where('id', $officeId);
            });
        } elseif ($corpId && $userId !== 'all') {
            $users->whereHas('office', function ($query) use ($corpId) {
                $query->where('corp_id', $corpId);
            })->where('id', $userId);
        } elseif ($corpId && $userId === 'all') {
            $users->whereHas('office', function ($query) use ($corpId) {
                $query->where('corp_id', $corpId);
            });
        } elseif ($officeId && $userId !== 'all') {
            $users->where('office_id', $officeId)->where('id', $userId);
        } elseif ($officeId && $userId === 'all') {
            $users->where('office_id', $officeId);
        } elseif ($userId === 'all') {
            $users = User::with('office');
        } elseif ($userId !== 'all') {
            $users->where('id', $userId);
        }

        // If neither corpId, officeId, nor userId is provided, fetch all users
        if (!$corpId && !$officeId && !$userId) {
            $users = User::with('office');
        }


        // Fetch attendance records for the selected year and month
        // $startDate = Carbon::createFromDate($selectedYear, $selectedMonth, 1);
        // $endDate = $startDate->copy()->endOfMonth();

        $startDate=Carbon::create($selectedYear, $selectedMonth, 16)->subMonth();
        $endDate=Carbon::create($selectedYear,$selectedMonth,15);



        $users->with([
            'userArrivalRecords' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('recorded_at', [$startDate, $endDate]);
            },
            'userArrivalRecords.arrivalDepartureRecords' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('recorded_at', [$startDate, $endDate]);
            },
            'timeOffRequestRecords' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date', [$startDate, $endDate]);
            }
        ]);

        $users = $users->paginate(4);
        // dd($startDate, $endDate);
        // dd($selectedYear, $selectedMonth, $startDate, $endDate);


        return view('user', compact('users', 'selectedYear', 'selectedMonth','startDate','endDate'));
    }

}
