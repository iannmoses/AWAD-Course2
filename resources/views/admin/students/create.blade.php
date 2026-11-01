@extends('layouts.app')
@section('title', 'Add student')
@section('content')
    <x-heading title="Add student" sub="Create a new student record. Student numbers must be unique." />

    <x-form-card :action="route('admin.students.store')" :cancel="route('admin.students.index')" submit="Save student">
        @include('admin.students._fields', ['student' => null])
    </x-form-card>
@endsection
