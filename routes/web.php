<?php

use App\Http\Controllers\Applicant\SettingsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

Route::resource('jobs', JobController::class);



Route::resource('companies', CompanyController::class);
Route::match(['get', 'post'], '/company/login', [CompanyController::class, 'login'])->name('company.login');
Route::post('/company/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/company/login');
})->name('company.logout');
Route::match(['get', 'post'], '/company/register', [CompanyController::class, 'register'])->name('company.register');
Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard');
Route::get('/company/settings', [CompanyController::class, 'settings'])->name('company.settings');




Route::resource('applicants', ApplicantController::class);
// Login
Route::match(['get', 'post'], '/applicant/login', [ApplicantController::class, 'login'])->name('applicant.login');
//logout
Route::post('/applicant/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/applicant/login');})->name('applicant.logout');
// Register
Route::match(['get', 'post'], '/applicant/register', [ApplicantController::class, 'register'])->name('applicant.register');
Route::post('/applicant/logout', [ApplicantController::class, 'logout'])->name('applicant.logout');
Route::get('/applicant/dashboard', [ApplicantController::class, 'dashboard'])->name('applicant.dashboard');

// Applicant Settings
Route::middleware(['auth'])->group(function () {
    Route::get('/applicant/settings', [App\Http\Controllers\Applicant\SettingsController::class, 'edit'])->name('applicants.settings');
    Route::post('/applicant/settings', [App\Http\Controllers\Applicant\SettingsController::class, 'update'])->name('applicants.settings.update');
});



Route::resource('applications', ApplicationController::class);
Route::patch('/applications/{application}/{status}', [ApplicationController::class, 'updateStatus'])
    ->name('applications.updateStatus');


Route::resource('feedbacks', FeedbackController::class);
Route::resource('messages', MessageController::class);
Route::resource('users', UserController::class);
Route::resource('register-company', RegisteredCompanyController::class)->only(['create','store']);

//require __DIR__.'/auth.php';
