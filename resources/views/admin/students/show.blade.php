@extends('layouts.app')
@section('title', $student->user->name)
@section('content')
    <x-heading :title="$student->user->name" :sub="$student->student_number.' · '.$student->programme.' · '.$student->year" :back="route('admin.students.index')" backText="Back to students" />

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <h2 class="text-sm font-semibold text-slate-500 mb-3">Registered courses</h2>
            <x-table :headers="['Course' => 'left', 'Title' => 'left', 'Lecturer' => 'left', 'Registered on' => 'left']">
                @forelse ($student->courses as $course)
                    <tr class="border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm"><span class="text-xs font-semibold text-[#2563eb]">{{ $course->course_code }}</span></td>
                        <td class="py-3 px-4 text-sm">{{ $course->course_name }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->lecturer->name }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ \Illuminate\Support\Carbon::parse($course->pivot->registration_date)->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-8 text-center text-sm text-slate-500">This student has not registered for any course.</td></tr>
                @endforelse
            </x-table>
        </div>

        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm h-fit">
            <h2 class="text-sm font-semibold text-slate-500 mb-4">Details</h2>
            <p class="text-xs text-slate-500">Email</p>
            <p class="text-sm mb-3">{{ $student->user->email }}</p>
            <p class="text-xs text-slate-500">Programme</p>
            <p class="text-sm mb-3">{{ $student->programme }}</p>
            <p class="text-xs text-slate-500">Year of study</p>
            <p class="text-sm mb-3">{{ $student->year }}</p>
            <p class="text-xs text-slate-500">Courses registered</p>
            <p class="text-sm mb-4">{{ $student->courses->count() }}</p>
            <div class="flex flex-wrap gap-2 pt-1">
                <x-btn :href="route('admin.students.edit', $student)" icon="edit">Edit</x-btn>
                <form action="{{ route('admin.students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student and all their registrations?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border border-red-200 text-red-600 rounded-lg text-sm font-medium hover:bg-red-50"><i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
