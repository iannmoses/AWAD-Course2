@extends('layouts.guest')
@section('title', 'Forgot password')
@section('card')
    <h1 class="text-xl font-bold mb-2">Forgot your password?</h1>
    <p class="text-sm text-slate-500 mb-6">Enter the email on your account. We will send a link so you can choose a new password.</p>
    <form action="{{ route('password.email') }}" method="POST" class="space-y-5">
        @csrf
        <x-input label="Email" name="email" type="email" placeholder="you@mubs.ac.ug" />
        <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Send reset link</button>
    </form>
    <p class="mt-6 text-center text-sm text-slate-500"><a href="{{ route('login') }}" class="text-[#2563eb] hover:text-[#1d4ed8]">Back to sign in</a></p>
@endsection
