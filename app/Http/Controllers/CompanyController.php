<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Application;
use App\Models\Message;
use App\Models\Applicant;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('companies.create');
    }

    // registration
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required|confirmed|min:8',
                'company_name' => 'required|string|max:255',
                'industry' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'logo_path' => 'nullable|string|max:255',
                'description' => 'nullable|string',
            ]);

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'company',
            ]);

            Company::create([
                'user_id' => $user->id,
                'name' => $request->company_name,
                'industry' => $request->industry,
                'logo_path' => $request->logo_path,
                'description' => $request->description,
            ]);

            return redirect()->route('companies.dashboard')->with('success', 'Company registered successfully.');
        }

        return view('companies.register');
    }

    //dashboard
  public function dashboard()
{
    $user = auth()->user();
    $company = $user->company; 

    // Get jobs for this company
    $jobs = $company->jobs;

    // Job stats
    $totalJobs = $jobs->count();
    $activeJobs = $jobs->where('status', 'active')->count();

    // Applications for these jobs
    $applications = \App\Models\Application::whereIn('job_id', $jobs->pluck('id'))->get();
    $totalApplications = $applications->count();

    // Application stats
    $pendingApplications = $applications->where('status', 'pending')->count();
    $acceptedApplications = $applications->where('status', 'accepted')->count();
    $rejectedApplications = $applications->where('status', 'rejected')->count();

    // Messages for this company
    $totalMessages = Message::where('receiver_id', $user->id)->count();

    return view('companies.dashboard', compact(
        'company', 
        'totalJobs',
        'activeJobs',
        'totalApplications',
        'pendingApplications',
        'acceptedApplications',
        'rejectedApplications',
        'totalMessages'
    ));
}

    // login
   public function login(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role !== 'company') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You are not authorized to access the company portal.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->route('companies.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    return view('companies.login');
}


    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', ['companies' => $company]);
    }

 public function edit(string $id)
{
    $company = Company::with('user')->findOrFail($id);
    return view('companies.settings', compact('company'));
}


public function update(Request $request, string $id)
{
    $company = Company::findOrFail($id);

    // Also fetch the related user (for email update)
    $user = $company->user;

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'industry' => 'nullable|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'logo_path' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);

    // Update company fields
    $company->update([
        'name' => $validated['name'],
        'industry' => $validated['industry'],
        'logo_path' => $validated['logo_path'],
        'description' => $validated['description'],
    ]);

    // Update user's email separately
    $user->update([
        'email' => $validated['email'],
    ]);

    return redirect()->back()->with('success', 'Company settings updated successfully.');
}

public function downloadCV($id)
{
    $applicant = Applicant::findOrFail($id);
    $cvPath = $applicant->cv_path; 

    if (!Storage::disk('public')->exists($cvPath)) {
        abort(404, 'CV file not found.');
    }

    return Storage::disk('public')->download($cvPath);
}


    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
    
    public function downloadApplicantFile($applicationId, $fileType)
{
    $application = Application::findOrFail($applicationId);

    $fileColumns = [
        'cv' => 'cv_path',
        'cover_letter' => 'cover_letter',
        'qualifications' => 'qualifications',
        'portfolio' => 'portfolio_path',
    ];

    if (!array_key_exists($fileType, $fileColumns)) {
        abort(404, 'Invalid file type requested.');
    }

    $filePath = $application->{$fileColumns[$fileType]};

    if (!$filePath || !Storage::disk('public')->exists($filePath)) {
        abort(404, 'File not found.');
    }

    return Storage::disk('public')->download($filePath);
}
public function settings()
{
    $company = auth()->user(); 
    return view('companies.settings', compact('company'));
}

}