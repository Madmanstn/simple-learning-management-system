<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return view('welcome');
});

// Role-based dashboard
Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Instructor courses routes
Route::middleware(['auth'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::resource('courses', CourseController::class);
    Route::get('/courses/{course}/applications', [CourseController::class, 'applications'])->name('courses.applications');
    Route::post('/courses/{course}/accept/{student}', [CourseController::class, 'acceptStudent'])->name('courses.accept');
    Route::post('/courses/{course}/reject/{student}', [CourseController::class, 'rejectStudent'])->name('courses.reject');
});

// Student courses routes
Route::middleware(['auth'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/courses', [StudentCourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/{course}', [StudentCourseController::class, 'show'])->name('courses.show');
        Route::post('/courses/{course}/apply', [EnrollmentController::class, 'apply'])->name('courses.apply');
        Route::post('/courses/{course}/withdraw', [EnrollmentController::class, 'withdraw'])->name('courses.withdraw');
    });

require __DIR__.'/auth.php';