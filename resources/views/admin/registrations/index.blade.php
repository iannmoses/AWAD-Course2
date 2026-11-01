@extends('layouts.app')
@section('title', 'Registrations')
@section('content')
    <x-heading title="Registrations" sub="Every student's course registrations.">
        <x-btn :href="route('admin.registrations.create')" icon="plus">New registration</x-btn>
    </x-heading>

    <x-filter-bar :action="route('admin.registrations.index')">
        <input type="search" name="q" value="{{ request('q') }}" class="input-field" placeholder="Search student name">
        <select name="course" class="input-field">
            <option value="">All courses</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" @selected((string) request('course') === (string) $course->id)>{{ $course->course_code }}</option>
            @endforeach
        </select>
    </x-filter-bar>

    <x-table :headers="['Student' => 'left', 'Course' => 'left', 'Lecturer' => 'left', 'Registered on' => 'left', 'Action' => 'center']">
        @forelse ($registrations as $registration)
            <tr class="border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                <td class="py-3 px-4"><x-person :name="$registration->student->user->name" :sub="$registration->student->student_number" /></td>
                <td class="py-3 px-4 text-sm"><span class="text-xs font-semibold text-[#2563eb]">{{ $registration->course->course_code }}</span> <span class="text-slate-500">{{ $registration->course->course_name }}</span></td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->course->lecturer->name }}</td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->registration_date->format('d M Y') }}</td>
                <td class="py-3 px-4 text-center">
                    <x-actions :delete="route('admin.registrations.destroy', $registration)" confirm="Remove this registration?" />
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="py-8 text-center text-sm text-slate-500">No registrations found.</td></tr>
        @endforelse
    </x-table>

    <div class="mt-4">{{ $registrations->links() }}</div>
@endsection
