<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with('user')
            ->when($request->q, fn ($query, $search) => $query->where(function ($where) use ($search) {
                $where->where('student_number', 'like', "%{$search}%")
                    ->orWhereHas('user', fn ($user) => $user->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%"));
            }))
            ->when($request->programme, fn ($query, $programme) => $query->where('programme', $programme))
            ->orderBy('student_number')
            ->paginate(10)
            ->withQueryString();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'student_number' => ['required', 'string', 'max:30', 'unique:students,student_number'],
            'programme' => ['required', Rule::in(Student::PROGRAMMES)],
            'year' => ['required', Rule::in(Student::YEARS)],
            'password' => ['required', Password::min(8)],
        ]);

        DB::transaction(function () use ($data) {
            $user = User::create(['name' => $data['name'], 'email' => $data['email'], 'password' => $data['password']]);
            $user->assignRole('student');
            $user->student()->create([
                'student_number' => $data['student_number'],
                'programme' => $data['programme'],
                'year' => $data['year'],
            ]);
        });

        return redirect()->route('admin.students.index')->with('success', 'Student saved successfully.');
    }

    public function show(Student $student)
    {
        return view('admin.students.show', ['student' => $student->load('user', 'courses.lecturer')]);
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', ['student' => $student->load('user')]);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($student->user_id)],
            'student_number' => ['required', 'string', 'max:30', Rule::unique('students', 'student_number')->ignore($student->id)],
            'programme' => ['required', Rule::in(Student::PROGRAMMES)],
            'year' => ['required', Rule::in(Student::YEARS)],
            'password' => ['nullable', Password::min(8)],
        ]);

        DB::transaction(function () use ($data, $student, $request) {
            $student->user->update(['name' => $data['name'], 'email' => $data['email']]);

            if ($request->filled('password')) {
                $student->user->update(['password' => $data['password']]);
            }

            $student->update([
                'student_number' => $data['student_number'],
                'programme' => $data['programme'],
                'year' => $data['year'],
            ]);
        });

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    // deleting the user also removes the student and their registrations (cascade)
    public function destroy(Student $student)
    {
        $student->user->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted.');
    }
}
