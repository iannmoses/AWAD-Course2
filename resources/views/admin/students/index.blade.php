@extends('layouts.app')
@section('title', 'Students')
@section('content')
    <x-heading title="Students" sub="Student records and their programmes.">
        <x-btn :href="route('admin.students.create')" icon="plus">Add student</x-btn>
    </x-heading>

    <x-filter-bar :action="route('admin.students.index')">
        <input type="search" name="q" value="{{ request('q') }}" class="input-field" placeholder="Search name or student number">
        <select name="programme" class="input-field">
            <option value="">All programmes</option>
            @foreach (\App\Models\Student::PROGRAMMES as $programme)
                <option value="{{ $programme }}" @selected(request('programme') === $programme)>{{ $programme }}</option>
            @endforeach
        </select>
    </x-filter-bar>

    <x-table :headers="['Student' => 'left', 'Student number' => 'left', 'Programme' => 'left', 'Year' => 'left', 'Actions' => 'center']">
        @forelse ($students as $student)
            <tr class="border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                <td class="py-3 px-4"><x-person :name="$student->user->name" :sub="$student->user->email" /></td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $student->student_number }}</td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $student->programme }}</td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $student->year }}</td>
                <td class="py-3 px-4 text-center">
                    <x-actions :show="route('admin.students.show', $student)" :edit="route('admin.students.edit', $student)" :delete="route('admin.students.destroy', $student)" confirm="Delete this student and all their registrations?" />
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="py-8 text-center text-sm text-slate-500">No students found.</td></tr>
        @endforelse
    </x-table>

    <div class="mt-4">{{ $students->links() }}</div>
@endsection
