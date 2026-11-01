@extends('layouts.guest')
@section('title', 'Create account')
@section('card')
    <div class="mb-6">
        <h1 class="text-xl font-bold">Create your account</h1>
        <p class="mt-1 text-sm text-slate-500">Student accounts can be created here. Lecturers and administrators are added by an administrator.</p>
        <p class="mt-2 text-xs text-[#d97706]">All fields are required.</p>
    </div>
    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <x-input label="Full name" name="name" placeholder="Michael Kato" />
        <x-input label="University email" name="email" type="email" placeholder="michael.kato@mubs.ac.ug" />
        <x-input label="Student number" name="student_number" placeholder="2023/BCC/027" />
        <x-select label="Programme" name="programme" :options="\App\Models\Student::PROGRAMMES" placeholder="Choose a programme" />
        <x-select label="Year of study" name="year" :options="\App\Models\Student::YEARS" placeholder="Choose a year" />
        <x-input label="Password" name="password" type="password" hint="At least 8 characters." />
        <x-input label="Confirm password" name="password_confirmation" type="password" />
        <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Create account</button>
    </form>
    <p class="mt-6 text-center text-sm text-slate-500">Already registered? <a href="{{ route('login') }}" class="text-[#2563eb] hover:text-[#1d4ed8]">Sign in</a></p>
@endsection
