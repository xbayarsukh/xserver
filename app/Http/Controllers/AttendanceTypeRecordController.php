<?php

namespace App\Http\Controllers;

use App\Models\AttendanceTypeRecord;
use Illuminate\Http\Request;

class AttendanceTypeRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendanceTypeRecords = AttendanceTypeRecord::all();
        return view('admin.attendance-type-records.index', compact('attendanceTypeRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attendance-type-records.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:attendance_type_records,name',
        ]);

        AttendanceTypeRecord::create($validatedData);

        return redirect()->route('admin.attendance-type-records.index')->with('success', '勤怠区分が正常に登録されました');
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceTypeRecord $attendanceTypeRecord)
    {
        return view('admin.attendance-type-records.show', compact('attendanceTypeRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceTypeRecord $attendanceTypeRecord)
    {
        return view('admin.attendance-type-records.edit', compact('attendanceTypeRecord'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceTypeRecord $attendanceTypeRecord)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:attendance_type_records,name,' . $attendanceTypeRecord->id,
        ]);

        $attendanceTypeRecord->update($validatedData);

        return redirect()->route('admin.attendance-type-records.index')->with('success', '勤怠区分が正常に更新されました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceTypeRecord $attendanceTypeRecord)
    {
        $attendanceTypeRecord->delete();

        return redirect()->route('admin.attendance-type-records.index')->with('success', '勤怠区分が正常に消去されました.');
    }
}
