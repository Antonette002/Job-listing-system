<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\Feedback;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $applications = Application::with(['applicant','job'])->get();
        return view('applications.index', compact('applications'));
    }

   public function show(Application $application)
{
    $application = Application::with(['applicant', 'job'])->find($application->id);

    return view('applications.show', compact('application'));
}


    /**
     * Show the form for creating a new resource.
     */
public function create(Request $request)
{
    $jobId = $request->query('job_id');

    if (!$jobId || !($job = \App\Models\Job::find($jobId))) {
        return redirect('/')->with('error', 'Invalid job selected.');
    }

    return view('applications.create', compact('job'));
}


    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('applicant.login')->with('error', 'You must be logged in to apply.');
    }

    if (!$user->applicant) {
        return redirect()->route('applicant.register')
                         ->with('error', 'Please complete your applicant profile before applying.');
    }

    $request->validate([
        'cover_letter' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'cv_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'portfolio_path' => 'nullable|file|mimes:pdf,doc,docx,zip,rar|max:4096',
        'job_id' => 'required|exists:jobs,id',
    ]);

    $coverLetterPath = $request->file('cover_letter')->store('cover_letters', 'public');
    $cvPath = $request->file('cv_path')->store('cvs', 'public');
    $portfolioPath = $request->hasFile('portfolio_path') 
        ? $request->file('portfolio_path')->store('portfolios', 'public')
        : null;

    $app = Application::create([
        'job_id' => $request->input('job_id'),
        'applicant_id' => $user->applicant->id,
        'cover_letter' => $coverLetterPath,
        'cv_path' => $cvPath,
        'portfolio_path' => $portfolioPath,
        'status' => 'pending',
    ]);

    return redirect()->back()->with('status', 'Application submitted successfully!');
}

//status update feedback
public function updateStatus(Application $application, $status)
{
    if (!in_array($status, ['accepted', 'rejected'])) {
        return back()->with('error', 'Invalid status.');
    }

    $application->status = $status;
    $application->save();

    Feedback::create([
        'applicant_id' => $application->applicant_id,
        'job_id' => $application->job_id,
        'message' => "Your application for the job '{$application->job->title}' has been {$status}.",
        'rating' => null,
    ]);

    return redirect()->back()->with('success', "Application marked as {$status}.");
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
