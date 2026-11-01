@extends('layouts.app')
@section('title', 'Edit student')
@section('content')
    <x-heading title="Edit student" :sub="'Update the details for '.$student->user->name.'.'" />

    <x-form-card :action="route('admin.students.update', $student)" method="PUT" :cancel="route('admin.students.index')" submit="Update student">
        @include('admin.students._fields', ['student' => $student])
    </x-form-card>
@endsection
