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

Route::group(
    [
        'prefix' => 'candidates/',
        'as' => 'candidates.',
        'middleware' => ['isCandidate']
    ],
    function () {

        Route::get('register', [CandidateController::class, 'register'])->name('register')->withoutMiddleware('isCandidate');
        Route::post('register', [CandidateController::class, 'store'])->name('store')->withoutMiddleware('isCandidate');
        Route::get('login', [CandidateController::class, 'login'])->name('login')->withoutMiddleware('isCandidate');
        Route::post('login', [CandidateController::class, 'loginCheck'])->name('loginCheck')->withoutMiddleware('isCandidate');
        Route::get('dashboard', [CandidateController::class, 'index'])->name('dashboard');
        Route::get('profile', [CandidateController::class, 'profile'])->name('profile');
        Route::get('profile/edit', [CandidateController::class, 'edit'])->name('edit');
        Route::put('profile/edit', [CandidateController::class, 'updateProfile'])->name('update');
        Route::post('create-education', [CandidateController::class, 'storeEducation'])->name('education.store');
        Route::post('create-experience', [CandidateController::class, 'storeExperience'])->name('experience.store');
        Route::put('education/edit/{education}', [CandidateController::class, 'updateEducation'])->name('education.update');
        Route::put('experience/edit/{experience}', [CandidateController::class, 'updateExperience'])->name('experience.update');
        Route::delete('candidates/experience/delete/{experience}', [CandidateController::class, 'destroyExperience'])->name('experience.delete');
        Route::delete('candidates/education/delete/{education}', [CandidateController::class, 'destroyEducation'])->name('education.delete');
    }
);






//Company route
Route::group(
    [
        'prefix' => 'companies/',
        'as' => 'companies.',
        'middleware' => ['isCompany']
    ],
    function () {

        Route::get('register', [CompanyController::class, 'register'])->name('register')->withoutMiddleware('isCompany');
        Route::post('register', [CompanyController::class, 'store'])->name('store')->withoutMiddleware('isCompany');
        Route::get('login', [CompanyController::class, 'login'])->name('login')->withoutMiddleware('isCompany');
        Route::post('login', [CompanyController::class, 'loginCheck'])->name('loginCheck')->withoutMiddleware('isCompany');
        Route::get('dashboard', [CompanyController::class, 'index'])->name('dashboard');
        Route::get('jobPost', [JobController::class, 'create'])->name('jobs.create');
        Route::post('jobPost', [JobController::class, 'store'])->name('jobs.store');
        Route::get('jobs', [JobController::class, 'index'])->name('jobs.list');
        Route::get('jobView/{job}', [JobController::class, 'show'])->name('jobs.view');
        Route::get('jobs/edit/{job}', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('jobs/edit/{job}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('companies/jobs/delete/{job}', [JobController::class, 'destroy'])->name('jobs.delete');
    }
);


//Candidate route





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
