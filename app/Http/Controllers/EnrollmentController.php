<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function apply(Request $request, Course $course)
    {
        $student = Auth::user();

        // Check if already applied
        $existing = $course->students()
            ->where('student_id', $student->id)
            ->exists();

        if ($existing) {
            return redirect('/dashboard')->with('info', 'You have already applied for this course.');
        }

        // Create enrollment record
        $course->students()->attach($student->id, [
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/dashboard')->with('success', 'Application submitted successfully!');
    }

    public function withdraw(Request $request, Course $course)
    {
        $student = Auth::user();
        $course->students()->detach($student->id);

        return redirect('/dashboard')->with('success', 'You have withdrawn from this course.');
    }
}