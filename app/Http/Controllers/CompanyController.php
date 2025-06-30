<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Application;
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
         $applications=Application::latest()->get();
        return 
        view('companies.dashboard',compact('applications'),
        [
            'totalApplications'=> Application::count(),
         
        ]) ;
        return 
        view('companies.dashboard') ;
    }

    //settings
    public function settings()
{
    return view('companies.settings'); 
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
            return redirect()->route('company.dashboard');
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
        $company = Company::findOrFail($id);
        return view('companies.edit', ['companies' => $company]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'industry' => 'nullable|string',
            'email' => 'required|email|unique:companies,email,' . $id,
            'logo_path' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $company = Company::findOrFail($id);
        $company->update($validated);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
