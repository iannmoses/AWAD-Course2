@extends('layouts.guest')
@section('title', 'Reset password')
@section('card')
    <h1 class="text-xl font-bold mb-2">Choose a new password</h1>
    <p class="text-sm text-slate-500 mb-6">Use at least 8 characters.</p>
    <form action="{{ route('password.update') }}" method="POST" class="space-y-5">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <x-input label="Email" name="email" type="email" :value="$email" />
        <x-input label="New password" name="password" type="password" />
        <x-input label="Confirm new password" name="password_confirmation" type="password" />
        <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Save new password</button>
    </form>
@endsection
