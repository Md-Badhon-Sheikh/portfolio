{{-- ============================================================
     Header / Sticky Navbar
     Logo (left) — Menu (center) — Social icons (right)
     "About Us" is a parent item with a dropdown of Education / Bio / Contact,
     each of which scrolls to #about and activates the matching tab (app.js).
     ============================================================ --}}
@php
    $navLinks = [
        ['label' => 'Home', 'href' => '#home'],
        ['label' => 'Services', 'href' => '#services'],
        ['label' => 'About Us', 'href' => '#about', 'children' => [
            ['label' => 'Education', 'tab' => 'education'],
            ['label' => 'Bio', 'tab' => 'bio'],
            ['label' => 'Contact', 'tab' => 'contact'],
        ]],
        ['label' => 'Skills', 'href' => '#skills'],
        ['label' => 'Portfolio', 'href' => '#portfolio'],
        ['label' => 'Gallery', 'href' => '#gallery'],
        ['label' => 'Experience', 'href' => '#experience'],
        ['label' => 'Contact', 'href' => '#contact'],
    ];
@endphp

<header id="site-header" class="sticky top-0 z-50 bg-[#FDF8F7]">
    <div class="mx-auto max-w-7xl px-4 lg:px-8">
        <div id="site-header-inner" class="flex items-center justify-between py-5 transition-shadow duration-300">

            {{-- Logo --}}
            <a href="#home" class="relative shrink-0 group">
                <img src="{{ asset('images/brand/logo.webp') }}" alt="Logo" class="w-28 md:w-32">
            </a>

            {{-- Desktop Menu (center) --}}
            <nav class="hidden lg:flex items-center gap-5 xl:gap-7 font-medium text-[#14295F] text-base xl:text-lg" aria-label="Primary">
                @foreach ($navLinks as $link)
                    @if (isset($link['children']))
                        <div class="relative group">
                            <a
                                href="{{ $link['href'] }}"
                                class="nav-link inline-flex items-center gap-1 text-heading/80 transition-colors duration-200 hover:text-orange-500"
                                data-nav-target="{{ ltrim($link['href'], '#') }}"
                            >
                                {{ $link['label'] }}
                                <svg class="h-3.5 w-3.5 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </a>
                            <div class="invisible absolute left-0 top-full z-20 w-48 rounded-xl bg-white p-2 opacity-0 shadow-[0_10px_40px_-15px_rgba(30,42,94,0.25)] transition-all duration-200 group-hover:visible group-hover:opacity-100">
                                @foreach ($link['children'] as $child)
                                    <a href="{{ $link['href'] }}" data-about-tab="{{ $child['tab'] }}" class="about-dropdown-link block rounded-lg px-4 py-2.5 text-sm font-medium text-heading/80 transition hover:bg-orange-50 hover:text-orange-500">
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ $link['href'] }}"
                            class="nav-link text-heading/80 transition-colors duration-200 hover:text-orange-500"
                            data-nav-target="{{ ltrim($link['href'], '#') }}"
                        >
                            {{ $link['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>

            {{-- Social icons (right) --}}
            <div class="hidden lg:flex items-center gap-4">
                <a href="https://wa.me/8801642874989" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"
                   class="bg-green-500 text-white p-2 rounded-md hover:opacity-80 transition hover:-translate-y-1">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2.003c-5.5 0-9.96 4.46-9.96 9.96 0 1.76.46 3.48 1.34 4.99L2 22l5.2-1.36a9.9 9.9 0 0 0 4.84 1.24h.005c5.5 0 9.96-4.46 9.96-9.96 0-2.66-1.04-5.16-2.92-7.04a9.9 9.9 0 0 0-7.04-2.92zm5.83 14.19c-.25.7-1.24 1.29-1.99 1.44-.53.11-1.22.2-3.56-.76-2.99-1.24-4.92-4.25-5.07-4.45-.15-.2-1.21-1.61-1.21-3.07s.76-2.18 1.03-2.48c.27-.29.58-.36.78-.36.2 0 .39.002.56.01.18.008.42-.07.66.5.25.6.85 2.07.92 2.22.07.15.12.32.02.52-.1.2-.15.32-.3.5-.15.17-.3.38-.44.5-.14.13-.29.28-.13.55.16.27.72 1.19 1.55 1.93 1.06.95 1.96 1.24 2.24 1.38.28.13.44.11.6-.07.17-.18.71-.83.9-1.11.19-.29.38-.24.63-.14.26.1 1.63.77 1.91.91.28.14.46.2.53.32.07.11.07.68-.18 1.38z"/></svg>
                </a>
                <a href="https://github.com/Alvee3120" target="_blank" rel="noopener noreferrer" aria-label="GitHub"
                   class="bg-[#181717] text-white p-2 rounded-md hover:opacity-80 transition hover:-translate-y-1">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                </a>
                <a href="https://www.linkedin.com/in/alvee3120" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"
                   class="bg-[#0A66C2] text-white p-2 rounded-md hover:bg-[#084a8f] transition hover:-translate-y-1">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button id="mobile-menu-toggle" type="button" aria-label="Toggle menu" aria-expanded="false" class="lg:hidden flex h-10 w-10 items-center justify-center text-[#14295F]">
                <svg id="icon-burger" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg id="icon-close" class="hidden h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Mobile Menu Panel --}}
        <nav id="mobile-menu" class="lg:hidden hidden mb-4 rounded-2xl bg-white p-4 shadow-[0_10px_40px_-15px_rgba(30,42,94,0.25)]" aria-label="Mobile">
            @foreach ($navLinks as $link)
                @if (isset($link['children']))
                    <a href="{{ $link['href'] }}" class="mobile-nav-link block rounded-xl px-4 py-3 text-sm font-medium text-heading/80 transition hover:bg-orange-50 hover:text-orange-500" data-nav-target="{{ ltrim($link['href'], '#') }}">
                        {{ $link['label'] }}
                    </a>
                    <div class="ml-3 border-l border-slate-200 pl-2">
                        @foreach ($link['children'] as $child)
                            <a href="{{ $link['href'] }}" data-about-tab="{{ $child['tab'] }}" class="mobile-nav-link about-dropdown-link block rounded-xl px-4 py-2 text-sm text-heading/60 transition hover:bg-orange-50 hover:text-orange-500">
                                {{ $child['label'] }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <a href="{{ $link['href'] }}" class="mobile-nav-link block rounded-xl px-4 py-3 text-sm font-medium text-heading/80 transition hover:bg-orange-50 hover:text-orange-500" data-nav-target="{{ ltrim($link['href'], '#') }}">
                        {{ $link['label'] }}
                    </a>
                @endif
            @endforeach
            <a href="https://wa.me/8801642874989" target="_blank" rel="noopener noreferrer" class="btn-primary mt-2 w-full">Contact</a>
        </nav>
    </div>
</header>
