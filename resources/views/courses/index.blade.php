@extends('layouts.app')
@section('title', 'Available courses')
@section('content')
    <x-heading title="Available courses" sub="Courses open for registration this semester." />

    <x-table :headers="['Course' => 'left', 'Title' => 'left', 'Lecturer' => 'left', 'Credit units' => 'left', 'Status' => 'left', 'Action' => 'center']">
        @forelse ($courses as $course)
            <tr class="border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                <td class="py-3 px-4 text-sm"><span class="text-xs font-semibold text-[#2563eb]">{{ $course->course_code }}</span></td>
                <td class="py-3 px-4 text-sm">{{ $course->course_name }}</td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $course->lecturer->name }}</td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $course->credit_units }}</td>
                <td class="py-3 px-4">
                    @if (in_array($course->id, $registeredIds))
                        <x-badge color="green">Registered</x-badge>
                    @else
                        <x-badge color="slate">Not registered</x-badge>
                    @endif
                </td>
                <td class="py-3 px-4 text-center">
                    @if (in_array($course->id, $registeredIds))
                        <span class="text-xs text-slate-400">Already registered</span>
                    @else
                        @can('register course')
                            <a href="{{ route('registrations.create', ['course' => $course->id]) }}" class="inline-flex items-center px-3 py-1.5 bg-[#2563eb] rounded-lg text-xs font-medium text-white hover:bg-[#1d4ed8]">Register</a>
                        @endcan
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="py-8 text-center text-sm text-slate-500">No courses have been added yet.</td></tr>
        @endforelse
    </x-table>
@endsection
