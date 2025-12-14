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
            // Get courses the student has applied for
            $appliedCourses = $user->enrolledCourses()->with('instructor')->get();
            return view('student', compact('appliedCourses'));
        } elseif ($user->role === 'instructor') {
            // Get instructor's courses with accepted students count
            $courses = $user->courses()
                ->withCount(['students' => function($query) {
                    $query->where('status', 'accepted');
                }])
                ->latest()
                ->get();
            return view('instructor', compact('courses'));
        }

        abort(403, 'Unauthorized');
    }
}