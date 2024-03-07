<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/token', function (Request $request) {


    $token = csrf_token();

    return response()->json(['token' => $token]);
});
Route::get('/', function () {
    return view('welcome');
});
//website route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobController::class, 'jobs'])->name('jobs');
Route::get('/jobDetails/{job}', [JobController::class, 'jobDetails'])->name('job.details');
Route::get('/jobApply/{job}', [JobController::class, 'apply'])->middleware('auth')->name('job.apply');




//Company route
Route::get('/companies/register', [CompanyController::class, 'register'])->name('companies.register');
Route::post('/companies/register', [CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies/login', [CompanyController::class, 'login'])->name('companies.login');
Route::post('/companies/login', [CompanyController::class, 'loginCheck'])->name('companies.loginCheck');
Route::get('/companies/dashboard', [CompanyController::class, 'index'])->name('companies.dashboard');
Route::get('companies/jobPost', [JobController::class, 'create'])->name('jobs.create');
Route::post('companies/jobPost', [JobController::class, 'store'])->name('jobs.store');
Route::get('companies/jobs', [JobController::class, 'index'])->name('jobs.list');
Route::get('/companies/jobView/{job}', [JobController::class, 'show'])->name('jobs.view');
Route::get('companies/jobs/edit/{job}', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('companies/jobs/edit/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('companies/jobs/delete/{job}', [JobController::class, 'destroy'])->name('jobs.delete');


//Candidate route
Route::get('/candidates/register', [CandidateController::class, 'register'])->name('candidates.register');
Route::post('/candidates/register', [CandidateController::class, 'store'])->name('candidates.store');
Route::get('/candidates/login', [CandidateController::class, 'login'])->name('candidates.login');
Route::post('/candidates/login', [CandidateController::class, 'loginCheck'])->name('candidates.loginCheck');
Route::get('/candidates/dashboard', [CandidateController::class, 'index'])->name('candidates.dashboard');
Route::get('/candidates/profile', [CandidateController::class, 'profile'])->name('candidates.profile');
Route::get('/candidates/profile/edit', [CandidateController::class, 'edit'])->name('candidates.edit');
Route::put('/candidates/profile/edit', [CandidateController::class, 'updateProfile'])->name('candidates.update');
Route::post('/candidates/create-education', [CandidateController::class, 'storeEducation'])->name('candidates.education.store');
Route::post('/candidates/create-experience', [CandidateController::class, 'storeExperience'])->name('candidates.experience.store');
Route::put('/candidates/education/edit/{education}', [CandidateController::class, 'updateEducation'])->name('candidates.education.update');
Route::put('/candidates/experience/edit/{experience}', [CandidateController::class, 'updateExperience'])->name('candidates.experience.update');
Route::delete('/candidates/education/delete/{education}', [CandidateController::class, 'destroyEducation'])->name('candidates.education.delete');
Route::delete('/candidates/experience/delete/{experience}', [CandidateController::class, 'destroyExperience'])->name('candidates.experience.delete');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['isAdmin'])->name('dashboard');
Route::get('admin/pages/home', [HomeController::class, 'create'])->name('admin.home')->middleware('isAdmin');
Route::post('admin/pages/home', [HomeController::class, 'store'])->name('admin.home.store')->middleware('isAdmin');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
