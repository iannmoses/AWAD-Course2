<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // all courses on offer, with a flag for the ones this student already took
    public function index(Request $request)
    {
        $student = $request->user()->student;
        abort_unless($student, 403, 'Your account has no student record. Ask an administrator.');

        return view('courses.index', [
            'courses' => Course::with('lecturer')->orderBy('course_code')->get(),
            'registeredIds' => $student->courses()->pluck('courses.id')->all(),
        ]);
    }
}
