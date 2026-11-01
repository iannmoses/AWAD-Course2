@extends('layouts.app')
@section('title', 'New registration')
@section('content')
    <x-heading title="New registration" sub="Register a student for a course. A student can only be registered once per course." />

    @php
        $studentOptions = $students->mapWithKeys(fn ($student) => [$student->id => $student->student_number.' — '.$student->user->name])->all();
        $courseOptions = $courses->mapWithKeys(fn ($course) => [$course->id => $course->course_code.' — '.$course->course_name])->all();
    @endphp

    <x-form-card :action="route('admin.registrations.store')" :cancel="route('admin.registrations.index')" submit="Save registration">
        <x-select label="Student" name="student_id" :options="$studentOptions" placeholder="Choose a student" />
        <x-select label="Course" name="course_id" :options="$courseOptions" placeholder="Choose a course" />
    </x-form-card>
@endsection
