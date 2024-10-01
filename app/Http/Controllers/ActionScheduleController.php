<?php

namespace App\Http\Controllers;

use App;
use App\Models\actionSchedule;
use App\Models\User;
use App\Models\Appointment;
use Carbon\Carbon;

use App\Models\Office;
use Illuminate\Http\Request;

class ActionScheduleController extends Controller
{





    public function editAppointment(Appointment $appointment)
    {
        // dd($appointment);
        return response()->json($appointment->load('actionSchedule'));
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        $validatedData=$request->validate([
            'action_schedule_id'=>'required|exists:action_schedule,id',
            'color'=>'required',
            'appointment_date'=>'required|date',
        ]);

        $appointment->update($validatedData);

        return response()->json(['message'=>'appointment successful','appointment'=>$appointment->load('actionSchedule')]);
    }


        public function destroyAppointment(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully']);
    }

    public function storeAppointment(Request $request)
    {
        $validatedData=$request->validate([
            'user_id'=>'required|exists:users,id',
            'time_slot'=>'required|integer|between:1,10',
            'action_schedule_id'=>'required|exists:action_schedule,id',
            'color'=>'required',
            'appointment_date'=>'required|date',
        ]);

        try{
            $appointment=new Appointment($validatedData);
            $appointment->save();

            return response()->json(['message'=>'appointment created'], 201);
        }catch(\Exception $e)
        {
            \Log::error('error saving appointment:' .$e->getMessage());
            return response()->json(['error'=>'an error occured while saving the appointment'],500);
        }


    }







    public function show($id, Request $request)

    {
       $office=Office::findOrFail($id);
       $users = $office->users;
       $actionSchedules=actionSchedule::where('office_id', $id)->get();

       $selectedDate=$request->input('date', Carbon::today()->format('Y-m-d'));

      $appointments=Appointment::whereDate('appointment_date', $selectedDate)
        ->whereIn('user_id', $users->pluck('id'))
        ->get();

        $selectedOfficeId=$office->id;

        return view('actionSchedule.show', compact('office','users','actionSchedules','selectedDate','appointments','selectedOfficeId'));


    }



    public function index()
    {

        $office = Office::with('corp')->get();
        return view('actionSchedule.index', compact('office'));
    }


    public function list($office_id)
    {

        $office=Office::findOrFail($office_id);
        $list=actionSchedule::where('office_id', $office_id)->get();

        return view('actionSchedule.list', compact('list','office'));

    }


    public function create(Request $request)
    {
        $office = Office::all();
        $selectedOfficeId=$request->input('selected_office_id');

        return view('actionSchedule.create',compact('office','selectedOfficeId'));

    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'office_id'=>'required|exists:offices,id',
        ]);

        $actionSchedule=actionSchedule::create($validatedData);
        return redirect()->route('actionSchedule.list', $actionSchedule->office_id)
        ->with('success', 'successful');

    }




    public function edit($id)
    {
        $actionSchedule=actionSchedule::findOrFail($id);
        $office=Office::all();

        return view('actionSchedule.edit', compact('actionSchedule','office'));


    }


    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'office_id'=>'required|exists:offices,id',
        ]);
        $actionSchedule=actionSchedule::findOrFail($id);
        $actionSchedule->update($validatedData);

        return redirect()->route('actionSchedule.list', $actionSchedule->office_id)
            ->with('success', '更新に成功しました');

    }


    public function destroy($id)
    {
        $actionSchedule=actionSchedule::findOrFail($id);
        $office_id=$actionSchedule->office_id;
        $actionSchedule->delete();

        return redirect()->route('actionSchedule.list', $office_id)
            ->with('success', '削除されました');
    }
}
