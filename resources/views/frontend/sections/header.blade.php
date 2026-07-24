{{-- ============================================================
     Header / Sticky Navbar
     Logo (left) — Menu (center) — Social icons (right)
     "About Us" is a parent item with a dropdown of Education / Bio / Contact,
     each of which scrolls to #about and activates the matching tab (app.js).
     ============================================================ --}}
@php
    $headerName = $owner->name ?? 'Badhon Sheikh';
    $headerContactLink = $owner->contact_link ?? '#contact';
    $isExternalHeaderContact = str_starts_with($headerContactLink, 'http') || str_starts_with($headerContactLink, 'mailto:');

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

            {{-- Logo (falls back to a text brand mark if none uploaded) --}}
            <a href="#home" class="relative shrink-0 group">
                @if ($owner?->logoUrl())
                    <img src="{{ $owner->logoUrl() }}" alt="{{ $headerName }}" class="h-10 w-auto md:h-12">
                @else
                    <span class="text-xl font-bold text-[#14295F] md:text-2xl">{{ $headerName }}<span class="text-orange-500">.</span></span>
                @endif
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

            {{-- Social icons (right) — only WhatsApp, GitHub, LinkedIn --}}
            @php
                $headerSocialOrder = ['whatsapp', 'github', 'linkedin'];
                $headerSocialLinks = $socialLinks
                    ->filter(fn ($link) => in_array($link->platform, $headerSocialOrder))
                    ->sortBy(fn ($link) => array_search($link->platform, $headerSocialOrder));
            @endphp
            <div class="hidden lg:flex items-center gap-4">
                @foreach ($headerSocialLinks as $link)
                    <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $link->label() }}"
                       class="{{ $link->bgClass() }} text-white p-2 rounded-md hover:opacity-80 transition hover:-translate-y-1">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">{!! $link->svgPaths() !!}</svg>
                    </a>
                @endforeach
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
            <a href="{{ $headerContactLink }}" @if ($isExternalHeaderContact) target="_blank" rel="noopener noreferrer" @endif class="btn-primary mt-2 w-full">Contact</a>
        </nav>
    </div>
</header>
