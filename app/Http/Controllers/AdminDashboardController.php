<?php

namespace App\Http\Controllers;

use App\Models\Corp;
use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }



    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); // Assuming admin guard is 'web'. Adjust as needed.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard'); // Redirect to admin login page after logout
    }





    // new conrollers


    public function showAssignCorporationForm(User $user)
    {
        $corporations = Corp::all();
        return view('admin.assign-corporation', compact('user', 'corporations'));
    }

    public function assignCorporation(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'corporation_id' => 'required|exists:corps,id',
        ]);

        $corporation = Corp::findOrFail($validatedData['corporation_id']);

        $user->office()->associate($corporation->offices()->first())->save();

        return redirect()->route('admin.role-permission.user.index')->with('success', 'Corporation assigned to the user successfully.');
    }


public function showAssignOfficeForm(User $user)
{
    $offices = Office::all();
    return view('admin.assign-office', compact('user', 'offices'));
}

public function assignOffice(Request $request, User $user)
{
    $validatedData = $request->validate([
        'office_id' => 'required|exists:offices,id',
    ]);

    $office = Office::findOrFail($validatedData['office_id']);

    $user->office()->associate($office)->save();

    return redirect()->route('admin.role-permission.user.index')->with('success', 'Office assigned to the user successfully.');
}



}
