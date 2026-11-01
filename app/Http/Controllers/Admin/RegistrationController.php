<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $registrations = CourseRegistration::with('student.user', 'course.lecturer')
            ->when($request->course, fn ($query, $course) => $query->where('course_id', $course))
            ->when($request->q, fn ($query, $search) => $query->whereHas('student.user', fn ($user) => $user->where('name', 'like', "%{$search}%")))
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.registrations.index', [
            'registrations' => $registrations,
            'courses' => Course::orderBy('course_code')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.registrations.create', [
            'students' => Student::with('user')->orderBy('student_number')->get(),
            'courses' => Course::orderBy('course_code')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('course_registrations', 'course_id')->where('student_id', $request->student_id),
            ],
        ], ['course_id.unique' => 'This student is already registered for this course.']);

        CourseRegistration::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'registration_date' => now()->toDateString(),
            'status' => 'registered',
        ]);

        return redirect()->route('admin.registrations.index')->with('success', 'Registration saved successfully.');
    }

    public function destroy(CourseRegistration $registration)
    {
        $registration->delete();

        return redirect()->route('admin.registrations.index')->with('success', 'Registration removed.');
    }
}
