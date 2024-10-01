<?php

namespace App\Http\Controllers;

use App\Models\Corp;
use App\Models\Room;
use App\Models\Office;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class RoomScheduleController extends Controller
{


    public function showSchedule($officeId, $date)
{
    $office = Office::findOrFail($officeId);
    $rooms = Room::where('office_id', $officeId)
        ->with(['reservations' => function($query) use ($date) {
            $query->whereDate('start_time', $date)
                  ->with('user');
        }])->get();

    return view('room.schedule', compact('office', 'rooms', 'date'));
}


    // public function index(Request $request)
    // {
    //     $offices=Office::all();
    //     $selectedOfficeId=$request->input('office_id');

    //     $selectedDate=$request->input('date', Carbon::today()->startOfMonth()->toDateString());



    //     $rooms = [];
    //     if ($selectedOfficeId) {
    //         $rooms = Room::where('office_id', $selectedOfficeId)->get();
    //     }



    //     return view('room.index' , compact('offices', 'rooms', 'selectedOfficeId','selectedDate'));
    // }
    public function index(Request $request)
    {
        $offices = Office::all();
        $selectedOfficeId = $request->input('office_id');
        $selectedDate = $request->input('date', Carbon::today()->startOfMonth()->toDateString());

        $reservations = collect();
        if ($selectedOfficeId) {
            $reservations = Reservation::whereHas('room', function ($query) use ($selectedOfficeId) {
                $query->where('office_id', $selectedOfficeId);
            })
            ->whereMonth('start_time', Carbon::parse($selectedDate)->month)
            ->whereYear('start_time', Carbon::parse($selectedDate)->year)
            ->with(['user', 'room'])
            ->get();
        }

        return view('room.index', compact('offices', 'selectedOfficeId', 'selectedDate', 'reservations'));
    }



    public function createReservation(Request $request)
{
    $validatedData = $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'title' => 'required|max:255',
        'description' => 'nullable',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
        'color' => 'required|string|max:7',
        'date' => 'required|date', // Add this line to validate the date
    ]);

    $date = $request->input('date');
    $startDateTime = Carbon::parse($date . ' ' . $validatedData['start_time']);
    $endDateTime = Carbon::parse($date . ' ' . $validatedData['end_time']);

    // If end time is before start time, assume it's the next day
    if ($endDateTime < $startDateTime) {
        $endDateTime->addDay();
    }

    $overlappingReservation=Reservation::where('room_id', $validatedData['room_id'])
    ->where(function($query) use ($startDateTime, $endDateTime)
    {
        $query->whereBetween('start_time',[$startDateTime, $endDateTime])
        ->orWhereBetween('end_time', [$startDateTime, $endDateTime])
        ->orWhere(function($query) use ($startDateTime, $endDateTime)
        {
            $query->where('start_time', '<=', $startDateTime)
            ->where('end_time', '>=', $endDateTime);
        });
    })
    ->first();

    if($overlappingReservation)
    {
        return response()->json([
            'success'=>false,
            'message'=>'this room is already booked'
        ],422);
    }

    $reservation = Reservation::create([
        'room_id' => $validatedData['room_id'],
        'user_id' => auth()->id(),
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'start_time' => $startDateTime,
        'end_time' => $endDateTime,
        'color' => $validatedData['color'],
    ]);

    return response()->json(['success' => true, 'reservation' => $reservation]);
}
    public function editReservation(Reservation $reservation)
    {
        $reservation->start_time=$reservation->start_time->format('H:i');
        $reservation->end_time=$reservation->end_time->format('H:i');
        return response()->json([
            'id'=>$reservation->id,
            'title'=>$reservation->title,
            'description'=>$reservation->description,
            'color'=>$reservation->color,
            'start_time'=>$reservation->start_time->format('H:i'),
            'end_time'=>$reservation->end_time->format('H:i'),
        ]);
    }
    public function updateReservation(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'color' => 'required|string|max:7',
        ]);

       $date=$reservation->start_time->toDateString();
       $startDateTime=Carbon::parse($date . '' . $validatedData['start_time']);
       $endDateTime=Carbon::parse($date . '' . $validatedData['end_time']);

       if($endDateTime< $startDateTime)
       {
        $endDateTime->addDay();
       }

       $overlappingReservation =Reservation::where('room_id', $reservation->room_id)
        ->where('id', '!=', $reservation->id)
        ->where(function($query) use ($startDateTime, $endDateTime)
        {
            $query->whereBetween('start_time', [$startDateTime, $endDateTime])
                ->orWhereBetween('end_time',[$startDateTime, $endDateTime])
                ->orWhere(function ($query) use ($startDateTime, $endDateTime)
                {
                    $query->where('start_time','<=', $startDateTime)
                        ->where('end_time', '>=', $endDateTime);
                });
        })->first();

        if($overlappingReservation)
        {
            return response()->json(
                [
                    'success'=>false,
                    'message'=>'this update conflicts'
                ],422
            );
        }
        $reservation->update([
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'start_time'=>$startDateTime,
            'end_time'=>$endDateTime,
            'color'=> $validatedData['color'],
        ]);

        return response()->json(['success'=>true, 'reservation'=>$reservation]);
    }

    public function deleteReservation(Reservation $reservation)
    {
        $reservation->delete();

       return response()->json(['success' =>true]);
    }


        public function create()
        {


            $offices = Office::all();



            return view('room.create', compact('offices',));
        }
        public function getDivisionsForOffice($officeId)
        {
            $divisions = Division::where('office_id', $officeId)->get();
            return response()->json($divisions);
        }

        public function store(Request $request)
        {
            $validatedData=$request->validate([
                'name'=>'required|max:255',
                'office_id' => 'required|exists:offices,id',

            ]);

            Room::create($validatedData);

            return redirect()->route('room.index')
            ->with('success', 'Room created successfully');

        }

    public function edit(Room $room)
    {
        $offices = Office::all();
        return view('room.edit', compact('room', 'offices'));

    }

    public function update(Request $request, Room $room)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'office_id' => 'required|exists:offices,id',

        ]);
        $room->update($validatedData);

        return redirect()->route('room.index', ['office_id'=>$room->office_id])
        ->with('success', 'Room updated');
    }
    public function destroy(Room $room)
    {
        $officeId = $room->office_id;
        $room->delete();

        return redirect()->route('room.index', ['office_id' => $officeId])
                         ->with('success', 'Room deleted successfully.');
    }

}
