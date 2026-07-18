<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard') — {{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @php
        $adminNav = [
            ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => '<rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>'],
            ['label' => 'Profile', 'route' => 'profile.edit', 'icon' => '<circle cx="12" cy="8" r="4"/><path d="M4 20a8 8 0 0 1 16 0"/>'],
            ['label' => 'Hero Stats', 'route' => 'admin.stats.index', 'icon' => '<path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/>'],
            ['label' => 'Services', 'route' => 'admin.services.index', 'icon' => '<rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/>'],
            ['label' => 'Skills', 'route' => 'admin.skills.index', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-6"/>'],
            [
                'label' => 'About Us',
                'icon' => '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/>',
                'children' => [
                    ['label' => 'Education', 'route' => 'admin.education.index', 'icon' => '<path d="M22 10v6M2 10l10-5 10 5-10 5-10-5z"/><path d="M6 12v5c0 1.66 2.69 3 6 3s6-1.34 6-3v-5"/>'],
                    ['label' => 'Bio Slider Images', 'route' => 'admin.about-images.index', 'icon' => '<rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>'],
                    ['label' => 'Contact Info', 'route' => 'admin.contact-infos.index', 'icon' => '<path d="M3 5a2 2 0 012-2h2.28a1 1 0 01.98.804l.716 3.578a1 1 0 01-.54 1.06l-1.548.774a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.06-.54l3.578.716a1 1 0 01.804.98V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>'],
                ],
            ],
            ['label' => 'Social Links', 'route' => 'admin.social-links.index', 'icon' => '<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.59 13.51 6.83 3.98M15.41 6.51l-6.82 3.98"/>'],
        ];
    @endphp
</head>
<body class="min-h-screen bg-page text-body antialiased">

    <div class="flex min-h-screen">
        {{-- Sidebar overlay (mobile) --}}
        <div id="admin-sidebar-overlay" class="fixed inset-0 z-30 hidden bg-heading/40 lg:hidden"></div>

        {{-- Sidebar --}}
        <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-40 w-64 -translate-x-full border-r border-heading/10 bg-white transition-transform duration-300 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0">
            <div class="flex h-16 items-center gap-2 border-b border-heading/10 px-6">
                <a href="{{ route('dashboard') }}" class="text-lg font-bold text-heading">
                    Mohammad Badhon<span class="text-primary">.</span>
                </a>
            </div>

            <nav class="space-y-1 px-4 py-6">
                @foreach ($adminNav as $item)
                    @if (isset($item['children']))
                        @php
                            $groupActive = collect($item['children'])->contains(
                                fn ($child) => request()->routeIs(\Illuminate\Support\Str::beforeLast($child['route'], '.').'.*')
                            );
                        @endphp
                        <div>
                            <button type="button"
                                class="admin-nav-group-toggle flex w-full items-center justify-between gap-3 rounded-xl px-4 py-3 text-sm font-medium transition {{ $groupActive ? 'bg-primary/10 text-primary' : 'text-heading/70 hover:bg-orange-50 hover:text-primary' }}">
                                <span class="flex items-center gap-3">
                                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $item['icon'] !!}</svg>
                                    {{ $item['label'] }}
                                </span>
                                <svg class="admin-nav-group-chevron h-4 w-4 shrink-0 transition-transform duration-200 {{ $groupActive ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div class="admin-nav-group-panel {{ $groupActive ? '' : 'hidden' }} mt-1 space-y-1 pl-4">
                                @foreach ($item['children'] as $child)
                                    <a href="{{ route($child['route']) }}"
                                        class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium transition {{ request()->routeIs($child['route']) ? 'bg-primary/10 text-primary' : 'text-heading/60 hover:bg-orange-50 hover:text-primary' }}">
                                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $child['icon'] !!}</svg>
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ route($item['route']) }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs($item['route']) ? 'bg-primary/10 text-primary' : 'text-heading/70 hover:bg-orange-50 hover:text-primary' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $item['icon'] !!}</svg>
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach

                <div class="my-4 border-t border-heading/10"></div>

                <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-heading/70 transition hover:bg-orange-50 hover:text-primary">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3 12l9-9 9 9"/><path d="M5 10v10h14V10"/></svg>
                    View Website
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-sm font-medium text-heading/70 transition hover:bg-red-50 hover:text-red-600">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
                        Sign Out
                    </button>
                </form>
            </nav>
        </aside>

        {{-- Main column --}}
        <div class="flex min-h-screen flex-1 flex-col">
            {{-- Topbar --}}
            <header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-heading/10 bg-white px-5 lg:px-8">
                <div class="flex items-center gap-3">
                    <button id="admin-sidebar-toggle" type="button" aria-label="Toggle sidebar" class="flex h-9 w-9 items-center justify-center rounded-lg text-heading hover:bg-orange-50 lg:hidden">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <h1 class="text-lg font-bold text-heading">@yield('title', 'Dashboard')</h1>
                </div>

                {{-- User menu --}}
                <div class="relative">
                    <button id="admin-user-menu-toggle" type="button" class="flex items-center gap-2.5 rounded-full py-1 pl-1 pr-3 transition hover:bg-orange-50">
                        @if (auth()->user()->avatarUrl())
                            <img src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->name }}" class="h-9 w-9 rounded-full object-cover">
                        @else
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-primary/10 text-sm font-bold text-primary">
                                {{ auth()->user()->initial() }}
                            </span>
                        @endif
                        <span class="hidden text-sm font-semibold text-heading sm:block">{{ auth()->user()->name }}</span>
                        <svg class="hidden h-4 w-4 text-heading/50 sm:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div id="admin-user-menu" class="absolute right-0 z-30 mt-2 hidden w-56 rounded-2xl border border-heading/10 bg-white p-2 shadow-[0_10px_40px_-15px_rgba(30,42,94,0.25)]">
                        <div class="border-b border-heading/10 px-3 py-2.5">
                            <p class="text-sm font-semibold text-heading">{{ auth()->user()->name }}</p>
                            <p class="truncate text-xs text-body">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="mt-1 flex items-center gap-2 rounded-xl px-3 py-2.5 text-sm font-medium text-heading/80 transition hover:bg-orange-50 hover:text-primary">
                            Edit Profile
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-2 rounded-xl px-3 py-2.5 text-left text-sm font-medium text-red-600 transition hover:bg-red-50">
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Content --}}
            <main class="flex-1 px-5 py-8 lg:px-8">
                @if (session('status'))
                    <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="border-t border-heading/10 px-5 py-5 text-center text-xs text-body lg:px-8">
                &copy; {{ date('Y') }} Mohammad Badhon. All rights reserved.
            </footer>
        </div>
    </div>

    <script>
        (function () {
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('admin-sidebar-overlay');
            const sidebarToggle = document.getElementById('admin-sidebar-toggle');

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }

            sidebarToggle?.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });
            overlay?.addEventListener('click', closeSidebar);

            const userMenuToggle = document.getElementById('admin-user-menu-toggle');
            const userMenu = document.getElementById('admin-user-menu');

            userMenuToggle?.addEventListener('click', (e) => {
                e.stopPropagation();
                userMenu.classList.toggle('hidden');
            });
            document.addEventListener('click', (e) => {
                if (!userMenu.classList.contains('hidden') && !userMenu.contains(e.target)) {
                    userMenu.classList.add('hidden');
                }
            });

            document.querySelectorAll('.admin-nav-group-toggle').forEach((toggle) => {
                toggle.addEventListener('click', () => {
                    toggle.nextElementSibling.classList.toggle('hidden');
                    toggle.querySelector('.admin-nav-group-chevron').classList.toggle('rotate-180');
                });
            });
        })();
    </script>

    @stack('scripts')
</body>
</html>
