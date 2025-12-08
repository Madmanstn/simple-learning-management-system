<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Auth::user()->courses()->latest()->get();
        return view('instructor.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('instructor.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $validated['instructor_id'] = Auth::id();

        Course::create($validated);

        return redirect()->route('instructor.courses.index')
            ->with('success', 'Course created successfully!');
    }

    public function edit(Course $course)
    {
        // Ensure instructor can only edit their own courses
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        return view('instructor.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        // Ensure instructor can only update their own courses
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $course->update($validated);

        return redirect()->route('instructor.courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        // Ensure instructor can only delete their own courses
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $course->delete();

        return redirect()->route('instructor.courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}