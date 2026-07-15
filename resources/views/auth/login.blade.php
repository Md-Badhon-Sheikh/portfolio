@extends('layouts.guest')

@section('title', 'Sign In')

@section('content')
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-heading">Welcome Back</h1>
        <p class="mt-2 text-sm text-body">Sign in to access your dashboard.</p>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-5" novalidate>
        @csrf

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-heading">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('email') border-red-400 @enderror"
                placeholder="you@example.com">
            @error('email') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <div class="mb-1.5 flex items-center justify-between">
                <label for="password" class="block text-sm font-medium text-heading">Password</label>
                <a href="{{ route('password.request') }}" class="text-xs font-medium text-primary hover:underline">Forgot password?</a>
            </div>
            <input type="password" id="password" name="password" required
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('password') border-red-400 @enderror"
                placeholder="••••••••">
            @error('password') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <label class="flex items-center gap-2 text-sm text-body">
            <input type="checkbox" name="remember" class="h-4 w-4 rounded border-heading/20 text-primary focus:ring-primary/30">
            Remember me
        </label>

        <button type="submit" class="btn-primary w-full">Sign In</button>
    </form>
@endsection
