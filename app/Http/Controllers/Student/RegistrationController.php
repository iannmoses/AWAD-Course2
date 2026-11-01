<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    // only this student's own registrations
    public function index(Request $request)
    {
        $student = $request->user()->student;
        abort_unless($student, 403, 'Your account has no student record. Ask an administrator.');

        return view('registrations.index', [
            'registrations' => $student->registrations()->with('course.lecturer')->latest('id')->get(),
        ]);
    }

    public function create(Request $request)
    {
        $student = $request->user()->student;
        abort_unless($student, 403, 'Your account has no student record. Ask an administrator.');

        return view('registrations.create', [
            'student' => $student->load('user'),
            'courses' => Course::orderBy('course_code')->get(),
            'registeredIds' => $student->courses()->pluck('courses.id')->all(),
        ]);
    }

    public function store(Request $request)
    {
        $student = $request->user()->student;
        abort_unless($student, 403, 'Your account has no student record. Ask an administrator.');

        $request->validate([
            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('course_registrations', 'course_id')->where('student_id', $student->id),
            ],
        ], ['course_id.unique' => 'You are already registered for this course.']);

        CourseRegistration::create([
            'student_id' => $student->id,
            'course_id' => $request->course_id,
            'registration_date' => now()->toDateString(),
            'status' => 'registered',
        ]);

        return redirect()->route('registrations.index')->with('success', 'You are now registered for the course.');
    }
}
