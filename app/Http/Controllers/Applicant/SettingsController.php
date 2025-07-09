<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function edit()
{
    $applicant = auth()->user()->applicant;  
    return view('applicants.settings', compact('applicant'));
}


    public function update(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $applicant = Auth::user()->applicant;
        $applicant->update($validated);

        return back()->with('success', 'Profile updated successfully.');
    }
}
