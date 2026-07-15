@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-heading">Reset Password</h1>
        <p class="mt-2 text-sm text-body">Choose a new password for your account.</p>
    </div>

    <form action="{{ route('password.update') }}" method="POST" class="space-y-5" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-heading">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required autofocus
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('email') border-red-400 @enderror"
                placeholder="you@example.com">
            @error('email') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password" class="mb-1.5 block text-sm font-medium text-heading">New Password</label>
            <input type="password" id="password" name="password" required
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('password') border-red-400 @enderror"
                placeholder="••••••••">
            @error('password') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="mb-1.5 block text-sm font-medium text-heading">Confirm New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                placeholder="••••••••">
        </div>

        <button type="submit" class="btn-primary w-full">Reset Password</button>
    </form>
@endsection
