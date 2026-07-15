{{-- ============================================================
     Header / Sticky Navbar
     Logo (left) — Menu (center) — Social icons (right)
     ============================================================ --}}
@php
    $navLinks = [
        ['label' => 'Home', 'href' => '#home'],
        ['label' => 'Services', 'href' => '#services'],
        ['label' => 'About', 'href' => '#about'],
        ['label' => 'Skills', 'href' => '#skills'],
        ['label' => 'Portfolio', 'href' => '#portfolio'],
        ['label' => 'Gallery', 'href' => '#gallery'],
        ['label' => 'Contact', 'href' => '#contact'],
    ];
@endphp

<header id="site-header" class="fixed inset-x-0 top-0 z-50 transition-all duration-300">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div id="site-header-inner" class="flex items-center justify-between rounded-full bg-white/90 px-5 py-3 shadow-[0_4px_30px_-10px_rgba(30,42,94,0.15)] backdrop-blur-md transition-all duration-300 mt-4">

            {{-- Logo --}}
            <a href="#home" class="shrink-0 text-xl font-bold text-heading">
                Badhon<span class="text-primary">.</span>
            </a>

            {{-- Desktop Menu (center) --}}
            <nav class="hidden lg:flex items-center gap-1" aria-label="Primary">
                @foreach ($navLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="nav-link relative rounded-full px-4 py-2 text-sm font-medium text-heading/80 transition hover:text-primary"
                        data-nav-target="{{ ltrim($link['href'], '#') }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Social icons (right) --}}
            <div class="hidden lg:flex items-center gap-3">
                <a href="#" target="_blank" rel="noopener" aria-label="LinkedIn"
                   class="flex h-9 w-9 items-center justify-center rounded-full bg-heading/5 text-heading transition hover:bg-primary hover:text-white">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.03-1.85-3.03-1.86 0-2.14 1.45-2.14 2.94v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.28 2.38 4.28 5.47v6.27zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.11 20.45H3.56V9h3.55v11.45z"/></svg>
                </a>
                <a href="#" target="_blank" rel="noopener" aria-label="GitHub"
                   class="flex h-9 w-9 items-center justify-center rounded-full bg-heading/5 text-heading transition hover:bg-primary hover:text-white">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.79-.25.79-.55v-2.15c-3.2.7-3.87-1.36-3.87-1.36-.53-1.33-1.29-1.68-1.29-1.68-1.06-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.04 1.77 2.72 1.26 3.38.96.1-.75.4-1.26.73-1.55-2.55-.29-5.24-1.28-5.24-5.68 0-1.25.45-2.28 1.18-3.08-.12-.29-.51-1.46.11-3.04 0 0 .96-.31 3.15 1.18a10.9 10.9 0 0 1 5.74 0c2.19-1.49 3.15-1.18 3.15-1.18.62 1.58.23 2.75.11 3.04.74.8 1.18 1.83 1.18 3.08 0 4.41-2.7 5.38-5.27 5.67.42.36.78 1.07.78 2.16v3.2c0 .3.21.66.79.55A10.51 10.51 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5z"/></svg>
                </a>
                <a href="#contact" class="btn-primary !px-5 !py-2 text-sm">Contact</a>
            </div>

            {{-- Mobile Hamburger --}}
            <button id="mobile-menu-toggle" type="button" aria-label="Toggle menu" aria-expanded="false" class="lg:hidden flex h-10 w-10 items-center justify-center rounded-full bg-heading/5 text-heading">
                <svg id="icon-burger" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg id="icon-close" class="hidden h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Mobile Menu Panel --}}
        <nav id="mobile-menu" class="lg:hidden hidden mt-2 rounded-3xl bg-white p-4 shadow-[0_10px_40px_-15px_rgba(30,42,94,0.25)]" aria-label="Mobile">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}" class="mobile-nav-link block rounded-xl px-4 py-3 text-sm font-medium text-heading/80 transition hover:bg-primary/10 hover:text-primary" data-nav-target="{{ ltrim($link['href'], '#') }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="#contact" class="btn-primary mt-2 w-full">Contact</a>
        </nav>
    </div>
</header>
