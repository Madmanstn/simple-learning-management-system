<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'student') {
            return view('student'); // resources/views/student.blade.php
        } elseif ($user->role === 'instructor') {
            return view('instructor'); // resources/views/instructor.blade.php
        }

        abort(403, 'Unauthorized');
    }
}
