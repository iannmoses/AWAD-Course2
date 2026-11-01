@extends('layouts.app')
@section('title', 'Edit course')
@section('content')
    <x-heading title="Edit course" :sub="'Update '.$course->course_code.' '.$course->course_name.'.'" />

    <x-form-card :action="route('admin.courses.update', $course)" method="PUT" :cancel="route('admin.courses.index')" submit="Update course">
        @include('admin.courses._fields', ['course' => $course])
    </x-form-card>
@endsection
