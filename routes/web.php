<?php

use App\Http\Controllers\ProfileController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::resource('courses', CourseController::class);
});


require __DIR__.'/auth.php';


