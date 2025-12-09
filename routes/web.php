<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; // add this
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentCourseController;


Route::get('/', function () {
    return redirect('/login');
});

// Role-based dashboard
Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Instructor courses routes
Route::middleware(['auth'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::resource('courses', CourseController::class);
});

Route::middleware(['auth'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/courses', [StudentCourseController::class, 'index'])
            ->name('courses.index');
    });
require __DIR__.'/auth.php';