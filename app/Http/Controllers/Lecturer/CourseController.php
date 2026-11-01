<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        return view('lecturer.courses.index', [
            'courses' => $request->user()->courses()->withCount('registrations')->orderBy('course_code')->get(),
        ]);
    }

    // a lecturer can only open their own courses
    public function show(Request $request, Course $course)
    {
        abort_unless($course->lecturer_id === $request->user()->id, 403, 'This course is not assigned to you.');

        return view('lecturer.courses.show', ['course' => $course->load('students.user')]);
    }
}
