@extends('layouts.app')
@section('title', 'Edit user')
@section('content')
    <x-heading title="Edit user" :sub="'Change the name, email or role of '.$user->name.'.'" />

    <x-form-card :action="route('admin.users.update', $user)" method="PUT" :cancel="route('admin.users.index')" submit="Update user">
        @include('admin.users._fields', ['user' => $user, 'roles' => ['student' => 'Student', 'lecturer' => 'Lecturer', 'admin' => 'Admin']])
    </x-form-card>
@endsection
