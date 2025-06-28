<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
use App\Models\Applicant;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $applications = Application::all();
        return view('applications.index', ['applications' => $applications]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{

    return view('applications.create');
}


    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $jobId = session('job_id');
    $applicantId = auth()->user()->applicant->id;

    $request->merge([
        'job_id' => $jobId,
        'applicant_id' => $applicantId,
    ]);

    $request->validate([
        'cover_letter' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'cv_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'portfolio_path' => 'nullable|file|mimes:pdf,doc,docx,zip,rar|max:4096',
        'job_id' => 'required|exists:jobs,id',
        'applicant_id' => 'required|exists:applicants,id',
    ]);

    $coverLetterPath = $request->file('cover_letter')->store('cover_letters', 'public');
    $cvPath = $request->file('cv_path')->store('cvs', 'public');
    $portfolioPath = $request->hasFile('portfolio_path') 
        ? $request->file('portfolio_path')->store('portfolios', 'public')
        : null;

    Application::create([
        'job_id' => $jobId,
        'applicant_id' => $applicantId,
        'cover_letter' => $coverLetterPath,
        'cv_path' => $cvPath,
        'portfolio_path' => $portfolioPath,
        'status' => 'pending',
    ]);

    return redirect()->back()->with('status', 'Application submitted successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Application deleted');
    }
}
