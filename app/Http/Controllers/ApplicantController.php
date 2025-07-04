<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Job;
use App\Models\Feedback;

class ApplicantController extends Controller
{
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'applicant',
            ]);

            Applicant::create([
                'user_id' => $user->id,
                'full_name' => $request->input('full_name'),
                'location' => $request->location,
                'phone' => $request->phone,
            ]);

       
            return redirect()->route('applicant.dashboard');
        }

        return view('applicants.register');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'applicant',
            ];

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('applicant.dashboard');
            }

            return back()->withErrors([
                'email' => 'Invalid credentials or not an applicant.',
            ]);
        }

        return view('applicants.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('applicant.login');
    }

    //dashboard
    public function dashboard()
    {
        $jobs=Job::latest()->get();
        return 
        view('applicants.dashboard',compact('jobs'),
        [
            'totalJobs'=> Job::count(),
          ]) ;
          $application = Application::where('applicant_id', auth()->id())->latest()->first();
          return view('applicant.dashboard', compact('application'));
        
    }

   //index

    public function index()
    {
        $applicants = Applicant::all();
        return view('applicants.index', ['applicants' => $applicants]);
    }

    public function create()
    {
        return view('applicants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'location' => 'required|string',
        ]);
        Applicant::create($validated);
        return redirect()->route('applicants.index')->with('success', 'Applicant added successfully');
    }

    public function show(string $id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('applicants.show', ['applicants' => $applicant]);
    }

    public function edit(string $id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('applicants.edit', ['applicants' => $applicant]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'location' => 'required|string',
        ]);
        $applicant = Applicant::findOrFail($id);
        $applicant->update($validated);

        return redirect()->route('applicants.index')->with('success', 'Applicant updated successfully');
    }

    public function destroy(string $id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->route('applicants.index')->with('success', 'Applicant deleted successfully');
    }
}
