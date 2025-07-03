<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $applicant = auth()->user()->applicant;
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
    $validated['job_id'] = $request->route('job'); // or optional hidden
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
    /**
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
