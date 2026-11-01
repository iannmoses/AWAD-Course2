@extends('layouts.app')
@section('title', $course->course_name)
@section('content')
    <x-heading :title="$course->course_name" :sub="$course->course_code.' · '.$course->credit_units.' credit units · '.$course->lecturer->name" :back="route('admin.courses.index')" backText="Back to courses" />

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <h2 class="text-sm font-semibold text-slate-500 mb-3">Registered students</h2>
            <x-table :headers="['Student' => 'left', 'Student number' => 'left', 'Programme' => 'left']">
                @forelse ($course->students as $student)
                    <tr class="border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                        <td class="py-3 px-4"><x-person :name="$student->user->name" :sub="$student->user->email" /></td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $student->student_number }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $student->programme }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="py-8 text-center text-sm text-slate-500">No student has registered for this course.</td></tr>
                @endforelse
            </x-table>
        </div>

        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm h-fit">
            <h2 class="text-sm font-semibold text-slate-500 mb-4">Details</h2>
            <p class="text-xs text-slate-500">Lecturer</p>
            <p class="text-sm mb-3">{{ $course->lecturer->name }}</p>
            <p class="text-xs text-slate-500">Credit units</p>
            <p class="text-sm mb-3">{{ $course->credit_units }}</p>
            <p class="text-xs text-slate-500">Students registered</p>
            <p class="text-sm mb-4">{{ $course->students->count() }}</p>
            <div class="flex flex-wrap gap-2 pt-1">
                <x-btn :href="route('admin.courses.edit', $course)" icon="edit">Edit</x-btn>
                <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Delete this course and all its registrations?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border border-red-200 text-red-600 rounded-lg text-sm font-medium hover:bg-red-50"><i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
