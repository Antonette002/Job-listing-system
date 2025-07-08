<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Application;

class FeedbackController extends Controller
{

    /**
     * Display a listing of the resource.
     */
public function index()
{
    $user = auth()->user();
    $applicant = $user?->applicant;

    if (!$applicant) {
        return redirect()->route('dashboard')->with('error', 'Only applicants can view feedback.');
    }

    $feedbacks = $applicant->feedbacks()->latest()->paginate(10);

    return view('feedbacks.index', compact('feedbacks'));
}

/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'message' => 'required|string',
        'rating' => 'nullable|integer|min:1|max:5',
    ]);
    $validated['applicant_id'] = auth()->user()->applicant->id;
    $validated['job_id'] = $request->route('job'); 
    Feedback::create($validated);
    return redirect()->route('feedbacks.index')->with('success', 'Feedback submitted');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedbacks.show', ['feedbacks' => $feedback]);
    }
    /* *
    * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedbacks.edit', ['feedbacks' => $feedback]);
    }
     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'message' => 'required|string',
        'rating' => 'nullable|integer|min:1|max:5',
    ]);
    $feedback = Feedback::findOrFail($id);
    $feedback->update($validated);
    return redirect()->route('feedbacks.index')->with('success', 'Feedback updated');
    }


    public function updateStatus(Application $application, $status)
    {
        if (!in_array($status, ['accepted', 'rejected'])) {
            return back()->with('error', 'Invalid status.');
        }

        // Update the status
        $application->status = $status;
        $application->save();

        // Auto-create feedback message
        Feedback::create([
            'applicant_id' => $application->applicant_id,
            'job_id' => $application->job_id,
            'message' => "Your application has been {$status}.",
            'rating' => null, 
        ]);

        return redirect()->route('applications.index')->with('success', 'Status updated and feedback sent.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('feedbacks.index')->with('success', 'Feedback deleted');
    }
}
