<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('instructor')
            ->where('status', 'published')
            ->latest()
            ->paginate(12);

        return view('student_courses', compact('courses'));
    }

    public function show(Course $course)
    {
        // Only show published courses
        if ($course->status !== 'published') {
            abort(404);
        }

        $course->load('instructor');
        
        // Check if current user is the instructor of this course
        $isInstructor = Auth::check() && Auth::id() === $course->instructor_id && Auth::user()->role === 'instructor';

        return view('student.course', compact('course', 'isInstructor'));
    }
}