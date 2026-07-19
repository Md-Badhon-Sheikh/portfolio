<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Joy Datta | Portfolio')</title>
    <meta name="description" content="@yield('description', 'Portfolio of Joy Datta — Graphic Designer')">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-page text-body antialiased">

    {{-- Preloader --}}
    <div id="preloader" class="fixed inset-0 z-[9999] flex items-center justify-center bg-page transition-opacity duration-500">
        <div class="h-12 w-12 animate-spin rounded-full border-4 border-primary/20 border-t-primary"></div>
    </div>

    @include('frontend.sections.header')

    <main>
        @yield('content')
    </main>

</body>
</html>
