<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

public function index()
{
    $user = auth()->user();

    if ($user->role === 'applicant') {
        // Get the logged-in applicant with their applications
        $applicant = \App\Models\Applicant::with('applications.job.company')
            ->where('user_id', $user->id)
            ->first();

        if (!$applicant || $applicant->applications->isEmpty()) {
            $users = collect();
        } else {
            // Get the companies from the jobs the applicant applied to
            $companies = $applicant->applications
                ->pluck('job.company')
                ->filter()
                ->unique('id');

            // Get user accounts for those companies
            $companyUserIds = $companies->pluck('user_id')->unique();

            $users = \App\Models\User::with('company')
                ->whereIn('id', $companyUserIds)
                ->get();
        }

    } elseif ($user->role === 'company') {
        // Get the logged-in company's profile
        $company = \App\Models\Company::where('user_id', $user->id)->first();

        if (!$company) {
            $users = collect();
        } else {
            // Get all applicants who applied to this company's jobs
            $jobs = \App\Models\Job::with('applications.applicant.user')
                ->where('company_id', $company->id)
                ->get();

            $applicantUsers = collect();

            foreach ($jobs as $job) {
                foreach ($job->applications as $application) {
                    if ($application->applicant && $application->applicant->user) {
                        $applicantUsers->push($application->applicant->user);
                    }
                }
            }

            
            $users = \App\Models\User::with('applicant')
                ->whereIn('id', $applicantUsers->unique('id')->pluck('id'))
                ->get();
        }

    } else {
        $users = collect();
    }

    return view('messages.index', compact('users'));
}



   
    // Send a message
    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
        ]);

        // Check roles to ensure sender and receiver are company/applicant 

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return response()->json(['message' => 'Message sent successfully', 'data' => $message]);
    }


    public function conversation($userId)
    {
        $currentUserId = Auth::id();

        $messages = Message::where(function($query) use ($currentUserId, $userId) {
            $query->where('sender_id', $currentUserId)
                  ->where('receiver_id', $userId);
        })->orWhere(function($query) use ($currentUserId, $userId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $currentUserId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    // Mark messages from a user as read
    public function markAsRead($userId)
    {
        $currentUserId = Auth::id();

        Message::where('sender_id', $userId)
            ->where('receiver_id', $currentUserId)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json(['message' => 'Messages marked as read']);
    }
    // Show conversation with user ID = $id
public function show($id)
{
    $authId = auth()->id();

    $messages = \App\Models\Message::where(function ($query) use ($authId, $id) {
            $query->where('sender_id', $authId)->where('receiver_id', $id);
        })->orWhere(function ($query) use ($authId, $id) {
            $query->where('sender_id', $id)->where('receiver_id', $authId);
        })->orderBy('created_at')->get();

    $chatUser = \App\Models\User::findOrFail($id);

    return view('messages.show', compact('messages', 'chatUser'));
}

// Send a new message
public function store(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'content' => 'required|string|max:1000',
    ]);

    \App\Models\Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'content' => $request->content,
    ]);

    return redirect()->route('messages.show', $request->receiver_id);
}

public function destroy($id)
{
    $message = \App\Models\Message::findOrFail($id);

    // Only allow sender to delete their own message
    if ($message->sender_id !== auth()->id()) {
        abort(403);
    }

    $message->delete();

    return back()->with('status', 'Message deleted.');
}

}
