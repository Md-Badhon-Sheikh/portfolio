{{-- ============================================================
     Footer Section
     Logo, quick links, socials, copyright + Back-to-top button (app.js)
     ============================================================ --}}
@php $footerName = $owner->name ?? 'Mohammad Badhon'; @endphp
<footer class="bg-heading py-14 text-white/70">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="flex flex-col items-center justify-between gap-8 border-b border-white/10 pb-10 sm:flex-row">
            <a href="#home" class="text-xl font-bold text-white">
                {{ $footerName }}<span class="text-primary">.</span>
            </a>

            <nav class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-sm" aria-label="Footer">
                <a href="#home" class="transition hover:text-primary">Home</a>
                <a href="#services" class="transition hover:text-primary">Services</a>
                <a href="#about" class="transition hover:text-primary">About</a>
                <a href="#skills" class="transition hover:text-primary">Skills</a>
                <a href="#portfolio" class="transition hover:text-primary">Portfolio</a>
                <a href="#gallery" class="transition hover:text-primary">Gallery</a>
                <a href="#contact" class="transition hover:text-primary">Contact</a>
            </nav>

            <div class="flex items-center gap-3">
                @foreach ($socialLinks as $link)
                    <a href="{{ $link->url }}" target="_blank" rel="noopener" aria-label="{{ $link->label() }}" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-primary">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">{!! $link->svgPaths() !!}</svg>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col items-center justify-between gap-4 pt-6 text-xs sm:flex-row">
            <p>&copy; <span id="current-year"></span> {{ $footerName }}. All rights reserved.</p>
            <p>Built with Laravel &amp; Tailwind CSS</p>
        </div>
    </div>

    {{-- Back to top --}}
    <button type="button" id="back-to-top" aria-label="Back to top"
        class="fixed bottom-6 right-6 z-40 flex h-12 w-12 translate-y-4 items-center justify-center rounded-full bg-primary text-white opacity-0 shadow-lg shadow-orange-500/30 transition duration-300 pointer-events-none">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/></svg>
    </button>
</footer>
