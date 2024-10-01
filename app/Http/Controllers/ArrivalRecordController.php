<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ArrivalRecord;
use Illuminate\Support\Facades\Auth;

class ArrivalRecordController extends Controller
{
//     public function store(Request $request)
//     {
//         $hours = $request->input('hours');
//         $minutes = $request->input('minutes');

//         // Create a Carbon instance with the current date and the provided hours and minutes
//         $arrivalTime = Carbon::now()->setTime($hours, $minutes);

//         $arrival = new ArrivalRecord();
//         $arrival->user_id = Auth::id();
//         $arrival->arrival_recorded_at = $arrivalTime;
//         $arrival->save();




//         // Redirect or return a response as needed
//         return redirect()->back()->with('success', 'Arrival record saved successfully.');
//     }




}
