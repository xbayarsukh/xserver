<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Models\Corp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalculationController extends Controller
{



    public function index()
    {
        $corps = Corp::all();
        $calculations=Calculation::all();
        return view('admin.calculations.index', compact('corps','calculations'));
    }

    public function show($id)
    {
        $corp = Corp::with('calculations')->findOrFail($id);
        // $calculations=Calculation::all();
        // dd($corp->toArray()); // This will show the corp data including calculations
        return view('admin.calculations.show', compact('corp'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $corps = Corp::all();
        return view('admin.calculations.create',compact('corps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'tsag' => 'required|max:255',
            'value' => 'required|max:255',
            'number' => 'required|numeric',
            'corps_id' => 'required|numeric',
        ]);

        $calculation = Calculation::create($validatedData);

        return redirect()->route('admin.calculations.index')->with('success', 'Calculation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Corp $corp)
    // {

    //     $corps = Corp::all();
    //     return view('admin.calculations.show', compact('calculation'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calculation $calculation)
    {
        return view('admin.calculations.edit', compact('calculation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calculation $calculation)
    {
        $validatedData = $request->validate([
            'tsag' => 'required|max:255',
            'value' => 'required|max:255',
            'number' => 'required|numeric',
        ]);

        $calculation->update($validatedData);

        return redirect()->route('admin.calculations.index')->with('success', 'Calculation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calculation $calculation)
    {
        // Delete the Calculation instance
        $calculation->delete();

        // Redirect or return a response
        return redirect()->route('admin.calculations.index')->with('success', 'Calculation deleted successfully.');
    }
}
