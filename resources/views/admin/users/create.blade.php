@extends('layouts.app')
@section('title', 'Add user')
@section('content')
    <x-heading title="Add user" sub="Add a lecturer or another administrator. Students are added on the Students page." />

    <x-form-card :action="route('admin.users.store')" :cancel="route('admin.users.index')" submit="Save user">
        @include('admin.users._fields', ['user' => null, 'roles' => ['lecturer' => 'Lecturer', 'admin' => 'Admin']])
    </x-form-card>
@endsection
