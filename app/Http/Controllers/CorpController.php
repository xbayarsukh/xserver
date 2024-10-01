<?php

namespace App\Http\Controllers;

use App\Models\Corp;
use Illuminate\Http\Request;

class CorpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corps = Corp::all();
        return view('admin.corp-office.corps.index', compact('corps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.corp-office.corps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'corp_name' => 'required|max:255',
        ]);

        Corp::create($validatedData);

        return redirect()->route('admin.corp-office.corps.index')->with('success', '会社が正常に登録されました');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corp $corp)
    {

        return view('admin.corp-office.corps.edit', compact('corp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Corp $corp)
    {
        $validatedData = $request->validate([
            'corp_name' => 'required|max:255',
        ]);

        $corp->update($validatedData);

        return redirect()->route('admin.corp-office.corps.index')->with('success', '会社が正常に更新されました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corp $corp)
    {
        $corp->delete();
        return redirect()->route('admin.corp-office.corps.index')->with('success', '会社が正常に消去されました.');
    }



}
