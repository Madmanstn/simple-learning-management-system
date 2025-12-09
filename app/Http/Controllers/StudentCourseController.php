<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function index()
    {
        return view('student_courses'); 
    }
}
