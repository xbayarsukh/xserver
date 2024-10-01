<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('admin.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => 'nullable|string|max:255',
            'number_plate' => 'nullable|string|max:255',
            'car_type' => 'nullable|string|max:255',
            'car_made_year' => 'nullable|string|max:4',
            'car_insurance_company' => 'nullable|string|max:255',
            'car_insurance_start' => 'nullable|date',
            'car_insurance_end' => 'nullable|date',
            'etc' => 'nullable|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'car_detail' => 'nullable|string',
        ]);

        if ($request->hasFile('image_path')) {
            $imageName = time().'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $validatedData['image_path'] = 'images/' . $imageName;
        }

        Car::create($validatedData);

        return redirect()->route('admin.car.index')->with('success', 'Car created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $validatedData = $request->validate([
            'car_id' => 'nullable|string|max:255',
            'number_plate' => 'nullable|string|max:255',
            'car_type' => 'nullable|string|max:255',
            'car_made_year' => 'nullable|string|max:4',
            'car_insurance_company' => 'nullable|string|max:255',
            'car_insurance_start' => 'nullable|date',
            'car_insurance_end' => 'nullable|date',
            'etc' => 'nullable|string|max:255',
            'image_path' => 'nullable|string|max:255',
            'car_detail' => 'nullable|string',
        ]);

        $car->update($validatedData);

        return redirect()->route('admin.car.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('admin.car.index')->with('success', 'Car deleted successfully.');
    }
}
