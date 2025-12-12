<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'student') {
            return view('student'); // resources/views/student.blade.php
        } elseif ($user->role === 'instructor') {
            // Fetch only courses created by this instructor
            $courses = Course::where('instructor_id', $user->id)
                             ->where('status', 'published') // optional filter
                             ->paginate(6); // adjust number per page

            return view('instructor', compact('courses'));
        }

        abort(403, 'Unauthorized');
    }
}
