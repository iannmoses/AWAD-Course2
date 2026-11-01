@extends('layouts.guest')
@section('title', 'Sign in')
@section('card')
    <div class="mb-6">
        <h1 class="text-xl font-bold text-slate-900">Sign in</h1>
        <p class="mt-1 text-sm text-slate-500">Use your university email to open your workspace.</p>
    </div>
    <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf
        <x-input label="Email" name="email" type="email" placeholder="you@mubs.ac.ug" />
        <x-input label="Password" name="password" type="password" placeholder="••••••••" />
        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-[#2563eb] focus:ring-[#2563eb]">
                <span class="text-sm text-slate-500">Keep me signed in</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm font-medium text-[#2563eb] hover:text-[#1d4ed8]">Forgot password?</a>
        </div>
        <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Sign in</button>
    </form>
    <p class="mt-6 text-center text-sm text-slate-500">New student? <a href="{{ route('register') }}" class="text-[#2563eb] hover:text-[#1d4ed8]">Create an account</a></p>
@endsection
