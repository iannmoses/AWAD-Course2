<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard', [
            'studentCount' => Student::count(),
            'courseCount' => Course::count(),
            'lecturerCount' => User::role('lecturer')->count(),
            'registrationCount' => CourseRegistration::count(),
            'latest' => CourseRegistration::with('student.user', 'course')->latest('id')->take(5)->get(),
        ]);
    }

    public function lecturer(Request $request)
    {
        $courses = $request->user()->courses()->withCount('registrations')->orderBy('course_code')->get();

        return view('lecturer.dashboard', [
            'courses' => $courses,
            'studentCount' => $courses->sum('registrations_count'),
            'creditUnits' => $courses->sum('credit_units'),
        ]);
    }

    public function student(Request $request)
    {
        $student = $request->user()->student;
        abort_unless($student, 403, 'Your account has no student record. Ask an administrator.');

        $courses = $student->courses()->with('lecturer')->orderBy('course_code')->get();

        return view('dashboard', [
            'courses' => $courses,
            'creditUnits' => $courses->sum('credit_units'),
            'availableCount' => Course::count() - $courses->count(),
        ]);
    }
}
