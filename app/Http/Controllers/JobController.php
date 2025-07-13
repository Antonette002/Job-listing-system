<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     * Shows only the jobs that belong to the currently logged-in company.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'company' && $user->company) {
            $jobs = $user->company->jobs;
        } else {
            $jobs = collect(); // Return empty if not a company
        }

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created job in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:Full-time,Part-time,Internship,Remote',
            'application_deadline' => 'required|date|after:today',
            'qualifications' => 'required|string',
            'responsibilities' => 'required|string',
        ]);

        $company = Auth::user()->company;

        Job::create([
            'company_id' => $company->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'employment_type' => $validated['employment_type'],
            'application_deadline' => $validated['application_deadline'],
            'qualifications' => $validated['qualifications'],
            'responsibilities' => $validated['responsibilities'],
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified job.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified job in the database.
     */
    public function update(Request $request, string $id)
{
    $job = Job::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:255',
        'employment_type' => 'required|in:Full-time,Part-time,Internship,Remote',
        'application_deadline' => 'required|date|after:today',
        'qualifications' => 'required|string',
        'responsibilities' => 'required|string',
    ]);

    $job->update($validated);

    return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
}

    /**
     * Remove the specified job from the database.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
