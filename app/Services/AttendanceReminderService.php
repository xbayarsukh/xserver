<?php

namespace App\Services;

use App\Notifications\ClockInReminder;
use App\Notifications\ClockOutReminder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceReminderService
{
    public function sendClockInReminders()
    {
        $users = User::whereDoesntHave('userArrivalRecords', function ($query) {
            $query->whereDate('recorded_at', Carbon::today());
        })->get();

        foreach ($users as $user) {
            $user->notify(new ClockInReminder());
        }
    }

    public function sendClockOutReminders()
    {
        $userIds = DB::table('arrival_records')
            ->whereDate('recorded_at', Carbon::today())
            ->whereDoesntHave('arrivalDepartureRecords', function ($query) {
                $query->whereDate('recorded_at', Carbon::today());
            })
            ->pluck('user_id');

        $users = User::whereIn('id', $userIds)->get();

        foreach ($users as $user) {
            $user->notify(new ClockOutReminder());
        }
    }
}
