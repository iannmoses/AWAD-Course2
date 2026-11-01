@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">Good day, {{ str(auth()->user()->name)->before(' ') }}</h1>
        <p class="text-slate-500 mt-1">Semester I 2026/2027 at a glance.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
        <x-stat icon="graduation-cap" color="blue" :number="$studentCount" label="Students" />
        <x-stat icon="book-open" color="amber" :number="$courseCount" label="Courses" />
        <x-stat icon="briefcase" color="blue" :number="$lecturerCount" label="Lecturers" />
        <x-stat icon="clipboard-check" color="green" :number="$registrationCount" label="Registrations" />
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-4">
        <h2 class="text-lg font-semibold">Latest registrations</h2>
        <x-btn :href="route('admin.registrations.create')" icon="plus">New registration</x-btn>
    </div>

    <x-table :headers="['Student' => 'left', 'Course' => 'left', 'Registered on' => 'left']">
        @forelse ($latest as $registration)
            <tr class="border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                <td class="py-3 px-4"><x-person :name="$registration->student->user->name" :sub="$registration->student->student_number" /></td>
                <td class="py-3 px-4 text-sm"><span class="text-xs font-semibold text-[#2563eb]">{{ $registration->course->course_code }}</span> <span class="text-slate-500">{{ $registration->course->course_name }}</span></td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->registration_date->format('d M Y') }}</td>
            </tr>
        @empty
            <tr><td colspan="3" class="py-8 text-center text-sm text-slate-500">No registrations yet.</td></tr>
        @endforelse
    </x-table>
@endsection
