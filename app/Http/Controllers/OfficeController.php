<?php

namespace App\Http\Controllers;

use App\Models\Corp;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices = Office::with('corp')->get();
        return view('admin.corp-office.offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $corps = Corp::all();
        // $corps = Corp::with('offices')->get();
        return view('admin.corp-office.offices.create', compact('corps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'corp_id' => 'required|exists:corps,id',
            'office_name' => 'required|max:255',
            'office_image' => 'image|mimes:jpeg,png,jpg,gif|max:10048', // max 10MB
        ]);

        if ($request->hasFile('office_image')) {
            $imagePath = $request->file('office_image')->store('office_images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        Office::create($validatedData);

        return redirect()->route('admin.corp-office.offices.index')->with('success', '会社が正常に登録されました');
    }



    /**
     * Display the specified resource.
     */
    public function show($officeId)
    {
        $office = Office::findOrFail($officeId);
        // You can define the logic to show the office details here
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($officeId)
    {
        $office = Office::findOrFail($officeId);
        $corps = Corp::all();
        return view('admin.corp-office.offices.edit', compact('office', 'corps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'corp_id' => 'required|exists:corps,id',
            'office_name' => 'required|max:255',
            'office_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        $office = Office::findOrFail($id);

        if ($request->hasFile('office_image')) {
            // Delete old image
            if ($office->image_path) {
                Storage::disk('public')->delete($office->image_path);
            }

            $imagePath = $request->file('office_image')->store('office_images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $office->update($validatedData);

        // Add this line for debugging
        \Log::info('Office updated: ', $validatedData);

        return redirect()->route('admin.corp-office.offices.index')->with('success', '会社が正常に更新されました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($officeId)
    {
        $office = Office::findOrFail($officeId);
        $office->delete();
        return redirect()->route('admin.corp-office.offices.index')->with('success', '会社が正常に消去されました.');
    }
}
