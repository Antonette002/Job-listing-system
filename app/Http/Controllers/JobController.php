<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job=Job::all();
        return view ('jobs.index' , ['jobs' => $job]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
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

    $company_id = auth()->user()->company->id;

    // Create the job using the validated data
    Job::create([
        'company_id' => auth()->user()->company->id, 
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job=Job::findOrFail($id);
        return view ('jobs.show',['jobs' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $job=Job::findOrFail($id);
        return view ('jobs.edit',['jobs' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated=$request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'location'=>'required|string'
        ]);
         $job=Job::findOrFail($id);
         $job->update($validated);
         return 
         redirect()->route('jobs.index')->with('job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job=Job::findOrFail($id);
        $job=delete();
        return 
         redirect()->route('jobs.index')->with('job deleted successfully');
    }
}
