<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ArrivalRecord;
use App\Models\DepartureRecord;

class DepartureRecordController extends Controller
{


    // public function create()
    // {
    //     $arrivalRecordId = ArrivalRecord::first()->id; // Replace this with your actual logic to fetch the arrival record ID

    //     // Dump the variable to check if it's set correctly
    //     // dd($arrivalRecordId);

    //     return redirect()->back()->with('arrivalRecordId', $arrivalRecordId);
    // }


    // public function store(Request $request)
    // {
    //     // Debugging to check the request data
    //     // dd($request->all());

    //     $request->validate([
    //         'arrival_record_id' => 'required',
    //         'hours' => 'required',
    //         'minutes' => 'required',
    //     ]);

    //     $hours = $request->input('hours');
    //     $minutes = $request->input('minutes');

    //     // Create a Carbon instance with the current date and the provided hours and minutes
    //     $departureTime = Carbon::now()->setTime($hours, $minutes);

    //     $departure = new DepartureRecord();
    //     $departure->arrival_record_id = $request->input('arrival_record_id');
    //     $departure->departure_recorded_at = $departureTime;
    //     $departure->save();

    //     // Redirect or return a response as needed
    //     return redirect()->back()->with('departure_success', 'Departure record saved successfully.');
    // }


}
