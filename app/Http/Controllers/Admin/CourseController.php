<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::with('lecturer')->withCount('registrations')
            ->when($request->q, fn ($query, $search) => $query->where(function ($where) use ($search) {
                $where->where('course_code', 'like', "%{$search}%")->orWhere('course_name', 'like', "%{$search}%");
            }))
            ->when($request->lecturer, fn ($query, $lecturer) => $query->where('lecturer_id', $lecturer))
            ->orderBy('course_code')
            ->paginate(10)
            ->withQueryString();

        return view('admin.courses.index', [
            'courses' => $courses,
            'lecturers' => User::role('lecturer')->orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.courses.create', ['lecturers' => User::role('lecturer')->orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        Course::create($request->validate($this->rules()));

        return redirect()->route('admin.courses.index')->with('success', 'Course saved successfully.');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', ['course' => $course->load('lecturer', 'students.user')]);
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', [
            'course' => $course,
            'lecturers' => User::role('lecturer')->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->validate($this->rules($course)));

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted.');
    }

    private function rules(?Course $course = null): array
    {
        return [
            'course_code' => ['required', 'string', 'max:20', Rule::unique('courses', 'course_code')->ignore($course)],
            'course_name' => ['required', 'string', 'max:255'],
            'credit_units' => ['required', 'integer', 'between:1,6'],
            'lecturer_id' => ['required', Rule::exists('users', 'id')],
        ];
    }
}
