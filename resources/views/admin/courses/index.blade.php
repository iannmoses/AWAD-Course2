@extends('layouts.app')
@section('title', 'Courses')
@section('content')
    <x-heading title="Courses" sub="All courses, their lecturers and registration numbers.">
        <x-btn :href="route('admin.courses.create')" icon="plus">Add course</x-btn>
    </x-heading>

    <x-filter-bar :action="route('admin.courses.index')">
        <input type="search" name="q" value="{{ request('q') }}" class="input-field" placeholder="Search code or title">
        <select name="lecturer" class="input-field">
            <option value="">All lecturers</option>
            @foreach ($lecturers as $lecturer)
                <option value="{{ $lecturer->id }}" @selected((string) request('lecturer') === (string) $lecturer->id)>{{ $lecturer->name }}</option>
            @endforeach
        </select>
    </x-filter-bar>

    <x-table :headers="['Course' => 'left', 'Title' => 'left', 'Lecturer' => 'left', 'Credit units' => 'left', 'Students' => 'left', 'Actions' => 'center']">
        @forelse ($courses as $course)
            <tr class="border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                <td class="py-3 px-4 text-sm"><span class="text-xs font-semibold text-[#2563eb]">{{ $course->course_code }}</span></td>
                <td class="py-3 px-4 text-sm">{{ $course->course_name }}</td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $course->lecturer->name }}</td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $course->credit_units }}</td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $course->registrations_count }}</td>
                <td class="py-3 px-4 text-center">
                    <x-actions :show="route('admin.courses.show', $course)" :edit="route('admin.courses.edit', $course)" :delete="route('admin.courses.destroy', $course)" confirm="Delete this course and all its registrations?" />
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="py-8 text-center text-sm text-slate-500">No courses found.</td></tr>
        @endforelse
    </x-table>

    <div class="mt-4">{{ $courses->links() }}</div>
@endsection
