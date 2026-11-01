@extends('layouts.app')
@section('title', 'Add course')
@section('content')
    <x-heading title="Add course" sub="Create a course and assign a lecturer. Course codes must be unique." />

    <x-form-card :action="route('admin.courses.store')" :cancel="route('admin.courses.index')" submit="Save course">
        @include('admin.courses._fields', ['course' => null])
    </x-form-card>
@endsection
