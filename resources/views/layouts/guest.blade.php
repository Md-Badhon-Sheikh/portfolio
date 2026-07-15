<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sign In') — {{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#FDF8F7] text-body antialiased">

    <div class="flex min-h-screen flex-col items-center justify-center px-5 py-12">
        <a href="{{ route('home') }}" class="mb-8 text-2xl font-bold text-[#14295F]">
            Mohammad Badhon<span class="text-primary">.</span>
        </a>

        <div class="w-full max-w-md card-surface p-8 sm:p-10">
            @yield('content')
        </div>

        <a href="{{ route('home') }}" class="mt-8 text-sm font-medium text-heading/60 transition hover:text-primary">
            &larr; Back to website
        </a>
    </div>

</body>
</html>
