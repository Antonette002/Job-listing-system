<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Applicant\SettingsController;

Route::get('/', function () {
    return view('home');
});

// job routes
Route::resource('jobs', JobController::class);

// company routes
Route::resource('companies', CompanyController::class);

Route::match(['get', 'post'], '/company/login', [CompanyController::class, 'login'])->name('company.login');
Route::match(['get', 'post'], '/company/register', [CompanyController::class, 'register'])->name('company.register');

Route::post('/company/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/company/login');
})->name('company.logout');

Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('companies.dashboard');
Route::get('/company/settings', [CompanyController::class, 'settings'])->name('company.settings');

// application file downloads (cv, cover letter, etc)
Route::get('/company/applications/{applicationId}/download/{fileType}', [CompanyController::class, 'downloadApplicantFile'])
    ->middleware('auth')
    ->name('company.applications.downloadFile');

// update application status (accept/reject)
Route::patch('/applications/{application}/status/{status}', [CompanyController::class, 'updateApplicationStatus'])
    ->name('applications.updateStatus');

// applicant routes
Route::resource('applicants', ApplicantController::class);

Route::match(['get', 'post'], '/applicant/login', [ApplicantController::class, 'login'])->name('applicant.login');
Route::match(['get', 'post'], '/applicant/register', [ApplicantController::class, 'register'])->name('applicant.register');

Route::post('/applicant/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/applicant/login');
})->name('applicant.logout');

Route::get('/applicant/dashboard', [ApplicantController::class, 'dashboard'])->name('applicant.dashboard');

Route::post('/applicant/settings', [SettingsController::class, 'update'])->name('applicants.settings.update');

// application, feedback, messages, users
Route::resource('applications', ApplicationController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('messages', MessageController::class);
Route::resource('users', UserController::class);

