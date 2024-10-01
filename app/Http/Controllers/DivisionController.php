<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices=Office::all();
        $divisions = Division::all();
        return view('admin.division.index', compact('divisions','offices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $offices=Office::all();
        return view('admin.division.create', compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'office_id' => 'required|exists:offices,id',
        ]);

        Division::create($validatedData);

        return redirect()->route('admin.division.index')->with('success', 'Division created successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(DivisionController $attendanceTypeRecord)
    // {
    //     return view('admin.attendance-type-records.show', compact('attendanceTypeRecord'));
    // }

    /**
     * Show the form for editing the specified resource.
     */


    //  public function edit($officeId)
    //  {
    //      $office = Office::findOrFail($officeId);
    //      $corps = Corp::all();
    //      return view('admin.corp-office.offices.edit', compact('office', 'corps'));
    //  }

     /**
      * Update the specified resource in storage.
      */
    //  public function update(Request $request, $officeId)
    //  {
    //      $validatedData = $request->validate([
    //          'corp_id' => 'required|exists:corps,id',
    //          'office_name' => 'required|max:255',
    //      ]);

    //      $office = Office::findOrFail($officeId);
    //      $office->update($validatedData);

    //      return redirect()->route('admin.corp-office.offices.index')->with('success', '会社が正常に更新されました');
    //  }



    public function edit($divisionId)
    {
        $division= Division::findOrFail($divisionId);
        $offices=Office::all();

        return view('admin.division.edit', compact('division', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $division->update($validatedData);

        return redirect()->route('admin.division.index')->with('success', '課が正常に更新されました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('admin.division.index')->with('success', '課が正常に消去されました.');
    }

}
