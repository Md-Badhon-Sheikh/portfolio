@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-heading">Forgot Password</h1>
        <p class="mt-2 text-sm text-body">Enter your email and we'll send you a password reset link.</p>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST" class="space-y-5" novalidate>
        @csrf

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-heading">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('email') border-red-400 @enderror"
                placeholder="you@example.com">
            @error('email') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn-primary w-full">Send Reset Link</button>
    </form>

    <p class="mt-6 text-center text-sm text-body">
        Remembered your password?
        <a href="{{ route('login') }}" class="font-medium text-primary hover:underline">Sign in</a>
    </p>
@endsection
